<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class User extends BaseController
{
    public function index()
    {
        $data['title'] = 'User Login/Register';
        return view('templates/header', $data)
            . view('users/user') // Your user.php view goes in app/Views/users/
            . view('templates/footer');
    }

    public function login()
    {
        $session = session();
        $request = \Config\Services::request();

        $username = $request->getPost('username');
        $password = $request->getPost('password');

        $userModel = new UserModel();

        // Try to find user by username or email
        $user = $userModel->where('username', $username)
                          ->orWhere('email', $username)
                          ->first();

        if ($user && password_verify($password, $user['password'])) {
            // Set session variables
            $session->set([
                'user_id'  => $user['id'],
                'username' => $user['username'],
                'logged_in' => true,
            ]);

            return redirect()->to('/home'); // Change this to your real dashboard page
        } else {
            $session->setFlashdata('error', 'Invalid username or password.');
            return redirect()->to('/user');
        }
    }

    public function register()
    {
        $request = \Config\Services::request();
        $session = session();

        $userModel = new UserModel();

        $data = [
            'fullname' => $request->getPost('fullname'),
            'email'    => $request->getPost('email'),
            'username' => $request->getPost('username'),
            'password' => password_hash($request->getPost('password'), PASSWORD_DEFAULT),
        ];

        // Check for duplicate username or email
        if ($userModel->where('username', $data['username'])->first() || $userModel->where('email', $data['email'])->first()) {
            $session->setFlashdata('error', 'Username or Email already exists.');
            return redirect()->to('/user');
        }

        // Save new user
        $userModel->insert($data);
        $session->setFlashdata('success', 'Registration successful. Please log in.');
        return redirect()->to('/user');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/user');
    }
}

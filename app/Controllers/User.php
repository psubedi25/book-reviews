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
            . view('users/user') // Make sure your view reflects the updated form fields
            . view('templates/footer');
    }

    public function login()
    {
        $session = session();
        $request = \Config\Services::request();

        $email = $request->getPost('email');
        $password = $request->getPost('password');

        $userModel = new UserModel();

        // Try to find user by email only
        $user = $userModel->where('email', $email)->first();

        if ($user && password_verify($password, $user['password'])) {
            // Set session variables
            $session->set([
                'user_id'  => $user['id'],
                'fullname' => $user['fullname'],
                'email'    => $user['email'],
                'logged_in' => true,
            ]);

            return redirect()->to('/view');
        } else {
            $session->setFlashdata('error', 'Invalid email or password.');
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
            'password' => password_hash($request->getPost('password'), PASSWORD_DEFAULT),
        ];

        // Check for duplicate email
        if ($userModel->where('email', $data['email'])->first()) {
            $session->setFlashdata('error', 'Email already exists.');
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

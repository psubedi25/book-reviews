<?php

namespace App\Controllers;

use App\Models\FeedbackModel;

class Contact extends BaseController
{
    public function index()
    {
        return view('pages/contact');

    }

    public function submit()
    {
        $model = new FeedbackModel();

        $data = [
            'name'    => $this->request->getPost('name'),
            'email'   => $this->request->getPost('email'),
            'subject' => $this->request->getPost('subject'),
            'message' => $this->request->getPost('message'),
        ];

        $model->insert($data);

        return redirect()->to('/contact')->with('success', 'Thank you for your feedback!');
    }
}

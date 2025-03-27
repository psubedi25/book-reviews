<?php

namespace App\Controllers;

use App\Models\BooksModel;

class Ajax extends BaseController
{
    public function get($slug = null)
    {
        $model = model(BooksModel::class);
        $data = $model->getBooks($slug);

        // Return data as JSON
        return $this->response->setJSON($data);
    }
}

<?php

namespace App\Controllers;

use App\Models\BooksModel;   // Local book model
use App\Models\BookModel;    // Google API saved book model

class Ajax extends BaseController
{
    // AJAX for Local Books (by slug)
    public function get($slug = null)
    {
        $model = model(BooksModel::class);
        $data = $model->getBooks($slug);

        return $this->response->setJSON($data);
    }

    // Save Book from Google Books API (via AJAX)
    public function saveBook()
    {
        $model = new BookModel();

        $data = [
            'title'       => $this->request->getPost('title'),
            'author'      => $this->request->getPost('author'),
            'description' => $this->request->getPost('description'),
            'thumbnail'   => $this->request->getPost('thumbnail'),
        ];

        if ($model->insert($data)) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'Book saved successfully!'
            ]);
        } else {
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'Failed to save the book.'
            ]);
        }
    }

    // New: AJAX for Viewing Google Saved Book by ID
    public function getGoogleBook($id)
    {
        $model = new BookModel();
        $book = $model->find($id);

        if ($book) {
            return $this->response->setJSON($book);
        }

        return $this->response->setStatusCode(404)->setJSON(['error' => 'Book not found']);
    }
}

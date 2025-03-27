<?php

namespace App\Controllers;

use App\Models\BooksModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Books extends BaseController
{
    public function index()
    {
        $model = model(BooksModel::class);

        $data = [
            'title'      => 'Book Collection List',
            'books_list' => $model->getBooks(),
        ];

        return view('templates/header', $data)
            . view('books/index')
            . view('templates/footer');
    }

    public function view(?string $slug = null)
    {
        $model = model(BooksModel::class);

        $data['book'] = $model->getBooks($slug);

        if ($data['book'] === null) {
            throw new PageNotFoundException('Cannot find the book: ' . $slug);
        }

        $data['title'] = $data['book']['title'];

        return view('templates/header', $data)
            . view('books/view')
            . view('templates/footer');
    }

    // Show the Create Book Form
    public function create()
    {
        helper('form');

        return view('templates/header', ['title' => 'Add a New Book'])
            . view('books/create')
            . view('templates/footer');
    }

    // Store Book to DB
    public function store()
    {
        helper(['form', 'url']);

        $data = $this->request->getPost([
            'title',
            'author',
            'genre',
            'published_year',
            'rating',
            'description',
        ]);

        if (! $this->validateData($data, [
            'title'          => 'required|max_length[255]|min_length[3]',
            'author'         => 'required|max_length[255]',
            'genre'          => 'required|max_length[100]',
            'published_year' => 'required|numeric',
            'rating'         => 'required|decimal',
            'description'    => 'required|max_length[5000]|min_length[10]',
        ])) {
            return $this->create(); // Reload form if validation fails
        }

        $post = $this->validator->getValidated();

        // Handle file upload
        $file = $this->request->getFile('cover_image');
        $coverImageName = '';

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $coverImageName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $coverImageName);
        }

        $model = model(BooksModel::class);

        $model->save([
            'title'          => $post['title'],
            'slug'           => url_title($post['title'], '-', true),
            'author'         => $post['author'],
            'genre'          => $post['genre'],
            'published_year' => $post['published_year'],
            'rating'         => $post['rating'],
            'description'    => $post['description'],
            'cover_image'    => $coverImageName
        ]);

        return view('templates/header', ['title' => 'Book Added'])
            . view('books/success')
            . view('templates/footer');
    }
}

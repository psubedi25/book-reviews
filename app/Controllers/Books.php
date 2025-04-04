<?php

namespace App\Controllers;

use App\Models\BooksModel;    // Local books
use App\Models\BookModel;     // Google saved books
use App\Models\ReviewModel;   // New Review model
use CodeIgniter\Exceptions\PageNotFoundException;

class Books extends BaseController
{
    public function index()
    {
        $booksModel = model(BooksModel::class);
        $savedModel = model(BookModel::class);

        $data = [
            'title'      => 'Book Collection List',
            'books_list' => $booksModel->getBooks(),
            'savedBooks' => $savedModel->findAll(), // Google books
        ];

        return view('templates/header', $data)
            . view('books/index')
            . view('templates/footer');
    }

    public function view(?string $slug = null)
    {
        $model = model(BooksModel::class);
        $reviewModel = model(ReviewModel::class);

        $data['book'] = $model->getBooks($slug);

        if ($data['book'] === null) {
            throw new PageNotFoundException('Cannot find the book: ' . $slug);
        }

        $data['reviews'] = $reviewModel
            ->where('book_slug', $slug)
            ->orderBy('created_at', 'DESC')
            ->findAll();

        $data['title'] = $data['book']['title'];

        return view('templates/header', $data)
            . view('books/view')
            . view('templates/footer');
    }

    public function create()
    {
        helper('form');

        return view('templates/header', ['title' => 'Add a New Book'])
            . view('books/create')
            . view('templates/footer');
    }

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

    // Handle review form submission

    public function submitReview()
{
    if (!session()->get('logged_in')) {
        // Store intent to submit so we can resume after login
        session()->setFlashdata('redirect_after_login', current_url());
        return redirect()->to('/user')->with('error', 'You must be logged in to submit a review.');
    }

    $reviewModel = model(ReviewModel::class);

    $data = [
        'book_slug' => $this->request->getPost('book_slug'),
        'reviewer'  => session()->get('fullname'), // Automatically use logged in name
        'comment'   => $this->request->getPost('comment'),
        'rating'    => $this->request->getPost('rating'),
    ];

    if (! $reviewModel->insert($data)) {
        return redirect()->back()->withInput()->with('errors', $reviewModel->errors());
    }

    return redirect()->back()->with('message', 'Review submitted successfully!');
 }
}

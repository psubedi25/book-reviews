<?php

namespace App\Controllers;

use App\Models\BookModel;

class GoogleBooksController extends BaseController
{
    private $apiKey = 'YOUR_GOOGLE_API_KEY'; // Replace with your actual API key

    // Google Book Search
    public function search()
    {
        $query = $this->request->getGet('q');

        if (!$query) {
            return view('api/googlebooks_search');
        }

        $url = "https://www.googleapis.com/books/v1/volumes?q=" . urlencode($query) . "&key=" . $this->apiKey;
        $response = file_get_contents($url);
        $books = json_decode($response, true);

        return view('api/googlebooks_search', [
            'books' => $books['items'] ?? [],
            'query' => $query
        ]);
    }

    // Save Book to Database
    public function saveBook()
    {
        $data = $this->request->getPost();

        $model = new BookModel();

        $model->save([
            'title'       => $data['title'] ?? '',
            'author'      => $data['author'] ?? '',
            'thumbnail'   => $data['thumbnail'] ?? '',
            'description' => $data['description'] ?? '',
        ]);

        return redirect()->back()->with('message', 'Book saved successfully!');
    }

    // View Saved Google Book by ID
    public function view($id)
    {
        $model = new BookModel();
        $book = $model->find($id);

        if (!$book) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Book not found");
        }

        return view('googlebooks/view', [
            'title' => $book['title'],
            'book'  => $book
        ]);
    }
}

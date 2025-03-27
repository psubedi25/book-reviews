<?php

namespace App\Controllers;

class GoogleBooksController extends BaseController
{
    private $apiKey = 'AIzaSyDczBNmBL4uw9DaGRy53VJsV1SBK-d9YQo'; // Replace with your actual API key

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
} // ? This closing brace was missing!

<?php

namespace App\Models;

use CodeIgniter\Model;

class BooksModel extends Model
{
    protected $table = 'books';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'title',
        'author',
        'genre',
        'description',
        'published_year',
        'rating',
        'slug',
	'cover_image'
    ];

    /**
     * @param false|string $slug
     * @return array|null
     */
    public function getBooks($slug = false)
    {
        if ($slug === false) {
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }
}

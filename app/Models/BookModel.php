<?php

namespace App\Models;
use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table = 'save_books';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'author', 'thumbnail', 'description'];
}

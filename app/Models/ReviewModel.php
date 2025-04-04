<?php

namespace App\Models;

use CodeIgniter\Model;

class ReviewModel extends Model
{
    protected $table      = 'reviews';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'book_slug',
        'reviewer',
        'comment',
        'rating',
    ];

    // Automatically manage timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; // We don't need updated_at for simple reviews

    // Auto-validate on insert/update
    protected $validationRules = [
        'book_slug' => 'required|string|max_length[255]',
        'reviewer'  => 'required|min_length[3]|max_length[255]',
        'comment'   => 'required|min_length[5]',
        'rating'    => 'required|decimal|greater_than_equal_to[0]|less_than_equal_to[5]',
    ];
}

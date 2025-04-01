<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table = 'feedback';
    protected $allowedFields = ['name', 'email', 'subject', 'message'];
    public $timestamps = true; // Automatically adds created_at & updated_at
}

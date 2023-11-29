<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowersLogbook extends Model
{
    use HasFactory;
    protected $table = 'borrowers_logbooks'; // Set the table name
    protected $fillable = ['name', 'author', 'reference', 'title', 'category', 'collection', 'course_year_level'];
}
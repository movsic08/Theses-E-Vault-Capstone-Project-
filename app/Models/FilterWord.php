<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilterWord extends Model
{
    use HasFactory;

    protected $table = 'filter_words';
    protected $fillable = [
        'word',
    ];
}

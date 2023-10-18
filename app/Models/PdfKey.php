<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfKey extends Model
{
    protected $table = 'pdf_keys';

    protected $guarded = [];
    use HasFactory;
}
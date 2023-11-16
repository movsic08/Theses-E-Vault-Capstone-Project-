<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocuPostType extends Model
{
    protected $fillable = [
        'document_type_name',
        'text_color',
        'bg_color',
    ];
    use HasFactory;
}

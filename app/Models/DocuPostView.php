<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocuPostView extends Model
{
    use HasFactory;
    protected $fillable = ['post_id', 'views_count'];

    public function post()
    {
        return $this->belongsTo(DocuPost::class, 'post_id');
    }
}

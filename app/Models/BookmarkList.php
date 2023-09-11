<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookmarkList extends Model {
    use HasFactory;
    protected $guarded = [];
    protected $table = 'bookmark_list';

    public function user() {
        return $this->belongsTo( User::class, 'id' );
    }

    public function docuPost() {
        return $this->belongsTo( DocuPost::class, 'id', 'reference' );
    }
}
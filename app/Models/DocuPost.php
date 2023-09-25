<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocuPost extends Model {
    use HasFactory;
    protected $guarded = [];
    protected $primaryKey = 'id';
    protected $table = 'docu_posts';

    public function bookmarkList() {
        return $this->hasMany( BookmarkList::class, 'post_id', 'reference' );
    }

    // public function scopeSearch( $query, $value ) {
    //     $query->where( 'title', 'like', '%{$value}%' );
    // }

}
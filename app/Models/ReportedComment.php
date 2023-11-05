<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportedComment extends Model
{
    use HasFactory;

    protected $table = 'reported_comments';

    protected $fillable = [
        'docu_post_id',
        'reporter_user_id',
        'reported_user_id',
        'reported_comment_id',
        'report_title',
        'report_other_context',
        'report_status',
    ];
    public function comment()
    {
        return $this->belongsTo(DocuPostComment::class, 'reported_comment_id');
    }
}

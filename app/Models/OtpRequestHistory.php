<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtpRequestHistory extends Model {
    use HasFactory;
    protected $table = 'otp_request_history';

    protected $fillable = [
        'user_id',
        'request_date',
        'request_count',
    ];
}
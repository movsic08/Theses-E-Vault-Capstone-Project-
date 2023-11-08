<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ForgotPasswordOtp extends Model
{
    use HasFactory;

    protected $table = 'forgot_password_otp';

    protected $fillable = [
        'user_id',
        'request_date',
        'request_count',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

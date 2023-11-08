<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerificationCodePassword extends Model
{
    use HasFactory;
    protected $table = 'verification_codes_passwords';

    protected $fillable = [
        'user_id',
        'email',
        'otp',
        'expire_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

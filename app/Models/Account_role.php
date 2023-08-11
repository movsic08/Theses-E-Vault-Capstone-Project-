<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account_role extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
    use HasFactory;
}
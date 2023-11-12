<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingWatermark extends Model
{
    use HasFactory;
    protected $table = 'setting_watermarks';
    protected $fillable = [
        'file_link',
        'file_name',
        'is_set',
    ];
}

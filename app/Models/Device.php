<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $table = 'devices';
    public $timestamps = false; // Menonaktifkan timestamps

    protected $fillable = [
        'device_name',
        'device_type',
        'current_value',
    ];
}

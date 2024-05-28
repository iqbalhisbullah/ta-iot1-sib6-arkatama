<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Led extends Model
{
    use HasFactory;

    // Menentukan kolom-kolom yang dapat diisi secara massal
    protected $guarded = [];
}

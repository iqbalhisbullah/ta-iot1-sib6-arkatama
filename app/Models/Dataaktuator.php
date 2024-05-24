<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataaktuator extends Model
{
    use HasFactory;
    protected $table = 'dataaktuator';
    protected $fillable = [
        'aktuator_id',
        'aktuator_name',
        'value',
    ];
}

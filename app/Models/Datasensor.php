<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Datasensor extends Model
{
    protected $table = 'datasensor';
    protected $fillable = ['sensor_type', 'value'];
}

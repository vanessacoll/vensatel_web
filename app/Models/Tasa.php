<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasa extends Model
{
    protected $table = 'tasa_cambiaria';

    use HasFactory;

    public $timestamps = false;

    public $incrementing = false;
}

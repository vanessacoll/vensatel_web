<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oficinas extends Model
{
    use HasFactory;

    protected $table = 'oficinas';

    public $timestamps = false;

    protected $primaryKey = 'id_oficina';
}

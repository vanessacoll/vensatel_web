<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConceptoPago extends Model
{
    use HasFactory;

    protected $table = 'concepto_pago';

    public $timestamps = false;

    protected $primaryKey = 'id_concepto';
}

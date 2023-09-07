<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sectorial extends Model
{
    use HasFactory;

    protected $table = 'sectoriales';

    public $timestamps = false;

    protected $primaryKey = 'id_sectorial';

     protected $fillable = [
        'id_sectorial',
        'nombre',
        'id_sectorial_wisphub',
    ];
}

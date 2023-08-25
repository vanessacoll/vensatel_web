<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;

    protected $table = 'zonas';

    public $timestamps = false;

    protected $primaryKey = 'id_zona';

     protected $fillable = [
        'id_zona',
        'nombre',
        'id_zona_wisphub',
    ];
}

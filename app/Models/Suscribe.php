<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscribe extends Model
{
    use HasFactory;


    protected $table = 'subscribe_contact';

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_contact',
        'name',
        'email',
        'telefono',
        'id_inmueble',
        'coordenadas',
        'direccion',
        'date',
        'pago',

    ];

    protected $primaryKey = 'id_contact';

    public function status()
    {
    return $this->belongsTo('App\Models\Status', 'id_status', 'id_status');
    }
}

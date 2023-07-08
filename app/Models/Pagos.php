<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    use HasFactory;

    protected $table = 'pagos';

    public $timestamps = false;

    protected $primaryKey = 'id_pago';

    protected $fillable = [
        'id_usuario',
        'id_metodo',
        'comprobante',
        'referencia',
        'fecha',
        'id_contact',
        'telefono',
        'id_status',
        'monto',
        'id_concepto',
        'hora',
        'id_oficina',

    ];

    public function status()
    {
    return $this->belongsTo('App\Models\Status', 'id_status', 'id_status');
    }

    public function metodo()
    {
    return $this->belongsTo('App\Models\MetodoPago', 'id_metodo', 'id_metodo');
    }

    public function concepto()
    {
    return $this->belongsTo('App\Models\ConceptoPago', 'id_concepto', 'id_concepto');
    }

    public function user()
    {
    return $this->belongsTo('App\Models\User', 'id_usuario', 'id');
    }

    public function oficinas()
    {
    return $this->belongsTo('App\Models\User', 'id_oficina', 'id_oficina');
    }

}

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

}

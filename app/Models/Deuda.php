<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deuda extends Model
{
    use HasFactory;

    protected $table = 'deuda';

    public $timestamps = false;

    protected $primaryKey = 'id_deuda';

    protected $fillable = [
        'id_deuda',
        'id_plan', 
        'id_concepto',
        'id_usuario', 
        'monto',
        'fecha',
        'id_status',
        'id_pago',
        'id_contact',
        'monto_extra',
        'concepto_extra',
        
    ];

    public function status()
    {
    return $this->belongsTo('App\Models\Status', 'id_status', 'id_status');
    }

    public function plan()
    {
    return $this->belongsTo('App\Models\Plan', 'id_plan', 'id_plan');
    }    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = 'planes';

    public $timestamps = false;

    protected $primaryKey = 'id_plan';

     protected $fillable = [
        'id_plan',
        'nombre', 
        'id_plan_wisphub',
        'tipo',
    ];

}

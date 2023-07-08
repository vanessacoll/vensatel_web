<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    public $timestamps = false;

    protected $primaryKey = 'id_message';

    protected $fillable = [
        'id_message',
        'message', 
        'id_usuario_from',
        'id_usuario_to', 
        'id_contact',
        'date',
        
    ];

    public function user_to()
    {
    return $this->belongsTo('App\Models\User', 'id_usuario_to', 'id');
    }

    public function user_from()
    {
    return $this->belongsTo('App\Models\User', 'id_usuario_from', 'id');
    }
}

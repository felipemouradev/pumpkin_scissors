<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assuntos extends Model
{
    //
    protected $guarded = ["id"];

    public function cliente(){
       return $this->belongsTo('App\Clientes', 'cliente_id', 'id');
    }

    public function usuario(){
       return $this->belongsTo('App\Usuarios', 'usuario_id', 'id');
    }
}

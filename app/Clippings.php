<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clippings extends Model
{
    //
    $guarded = ['id'];

    public function editoria(){
       return $this->belongsTo('App\Editorias', 'editoria_id', 'id');
    }

    public function jornal(){
       return $this->belongsTo('App\Jornais', 'jornal_id', 'id');
    }

    public function status(){
       return $this->belongsTo('App\Status', 'status_id', 'id');
    }

    public function fonte(){
       return $this->belongsTo('App\Fontes', 'fonte_id', 'id');
    }
}

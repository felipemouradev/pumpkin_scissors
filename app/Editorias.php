<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Editorias extends Model
{
    //
    protected $guarded = ["id"];

    public function jornal(){
       return $this->belongsTo('App\Jornais', 'jornal_id', 'id');
    }
}

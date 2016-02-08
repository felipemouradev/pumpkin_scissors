<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\EnvioClippings;

class Envios extends Model
{
    //
    protected $guarded = ["id"];

    public function clippingEnvios(){
      return $this->hasMany('App\EnvioClippings','envio_id','id');
    }
}

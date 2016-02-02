<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Assuntos;

class Clientes extends Model
{
    //
    protected $guarded = ["id"];

    public static function saveTypes($cliente_id,$usuario_id) {
      $true = 0;
      $assuntos = [
        ["nome"=>"Informativo","slug_name"=>str_slug("Informativo"),"usuario_id"=>$usuario_id,"cliente_id"=>$cliente_id],
        ["nome"=>"Publicade Legal","slug_name"=>str_slug("Publicade Legal"),"usuario_id"=>$usuario_id,"cliente_id"=>$cliente_id],
        ["nome"=>"Propaganda","slug_name"=>str_slug("Publicade Legal"),"usuario_id"=>$usuario_id,"cliente_id"=>$cliente_id]
      ];
      foreach ($assuntos as $assunto) {
        $insert = Assuntos::create($assunto);
        if($insert) $true++;

      }

      if($true == count($assuntos)) return true;

      return false;
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Jornais;
use App\Editorias;
use App\Status;
use App\Fontes;
use App\Clientes;
use App\Assuntos;

class Clippings extends Model
{
    //
    protected $guarded = ['id'];

    public static function getJornalByEditoria($editoria_id){
      $select = Editorias::select('jornal_id')->find($editoria_id)->toArray();
      return $select['jornal_id'];
    }
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

    public function cliente(){
       return $this->belongsTo('App\Clientes', 'cliente_id', 'id');
    }

    public function usuario(){
       return $this->belongsTo('App\Usuarios', 'usuario_id', 'id');
    }

    public function assunto() {
       return $this->belongsTo('App\Assuntos', 'assunto_id', 'id');
    }

    public static function getIdBySlug($slug,$model_name) {
      $model = "App\\".$model_name;
      //dd($model);
      $search = $model::select('id')->where('slug_name',$slug)->get()->toArray();
      return (!empty($search[0]['id'])) ? $search[0]['id'] : $slug." não encontrado em ".$model_name;
    }

    public static function EditoriaBelongsToJornal($jornal_id,$editoria_id) {

      $test = Editorias::where('jornal_id',$jornal_id)->where('id',$editoria_id)->count();
      //dd($jornal_id."--".$editoria_id);
      return ($test > 0) ? $test : "a editoria não pertence ao jornal";
    }

    public static function getIdBySlugEditoria($jornal_id,$slug) {
      $search = Editorias::select('id')->where('jornal_id',$jornal_id)->where('slug_name',$slug)->get()->toArray();
      //dd($search);
      return (!empty($search[0]['id'])) ? $search[0]['id'] : $slug." não pertence ao jornal";
    }

    public static function formatDataClipping($data) {
      $exp = explode('.',$data);
      if (count($exp)!=3) return false;
      $exp[2] = "2".str_pad($exp[2], 3, "0", STR_PAD_LEFT);
      $new_data = $exp[2]."-".$exp[1]."-".$exp[0];

      return $new_data;
    }

    public static function formatArray($data) {

      for($i=0;$i<count($data['assunto_id']);$i++ ){
        $format[] = [
          'assunto_id'=>$data['assunto_id'][$i],
          'assunto'=>$data['assunto'][$i],
          'cliente_id'=>$data['cliente_id'][$i],
          'image_clipping'=>$data['image_clipping'][$i],
          'archive'=>$data['archive'][$i]
        ];
      }

      return $format;
    }

    function buscaAssunto($cliente_id,$nome) {
      $find = Assuntos::select('id')->where('cliente_id',$cliente_id)->where('nome',$nome)->get()->toArray();

      if(!empty($find)) return $find[0]['id'];
      return false;
    }

    function insertNewAssunto($cliente_id,$nome) {
      $insert = Assuntos::create(['cliente_id'=>$cliente_id,'nome'=>$nome]);

      if($insert) return $insert->id;
      return false;
    }
    public static function getClienteNameByID($id) {
      $find = Clientes::select('nome')->where('id',$id)->get()->toArray();
      //dd($find);
      return $find[0]["nome"];
    }
}

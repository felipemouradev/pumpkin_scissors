<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Clippings;
use App\Jornais;
use App\Editorias;
use App\Assuntos;
use App\Status;
use App\Fontes;
use App\Clientes;

class ClippingController extends Controller
{
    //
    public function listar(){
        $data = Clippings::paginate(10);
        return view('sistemas.clippings.listClippings',compact('data',$data));
    }
    public function escolhe() {
      $clientes = Clientes::all();
      return view('sistemas.clippings.newClippingsChoiceClient',compact('clientes',$clientes));
    }

    public function criar(Request $request){

      $data = $request->all();

      if (!empty($data)) $request->session()->put('params',$data);

      if (empty($data) && empty($request->session()->get('params'))) {
        $request->session()->put('status','Selecione primeiro o cliente, o numero de clipping e o tipo deles!');
        return redirect('/admin/clipping/escolhe');
      }
      $new_data = $request->session()->get('params');
      $assuntos = Assuntos::where('cliente_id',$new_data['cliente_id'])->get();

    	return view('sistemas.clippings.newClippings',compact('assuntos',$assuntos));
    }

    public function procMsgErrors($iterator = null) {

      if($iterator==null) return "Favor preencha a formulario";

      $count = 0;
      $msgError = array();
      $msgErrorPrint = array();
      foreach ($iterator as $k) {

        foreach ($k as $key => $value) {

          if($key == "data_clipping")  {
            $exp = explode("-",$value);
            if (count($exp)!=3) {
              $msgError[$count][] = [
                $key => $value,
              ];
            }
          }

          if($key== "data_clipping" || $key =="assunto" || $key == "image_clipping" || $key == "file_clipping") continue;
          if(!is_numeric($value) ){
            $msgError[$count][] = [
              $key => $value,
            ];
          }
        }
        $count++;
      }
      return $msgError;
    }

    public function uploadClipping(Request $request) {
        $file = 'image_clipping';
        if ($request->hasFile($file)) {
            $count = 0;

            $data = $request->all();
            //dd($data);
            foreach ($request->file($file) as $f) :

              $ext = $f->getClientOriginalExtension();
              $nameOriginal = $f->getClientOriginalName();
              $exp = explode('.',$nameOriginal);
              $archive = str_slug($exp[0]).".".$ext;

              $exp2 = explode(" - ",$nameOriginal);

              $array_clipping[] = [
                'assunto_id' => (!isset($data['assunto_id'][$count])) ? null : $data['assunto_id'][$count],
                'assunto' => $data['assunto'][$count],
                'cliente_id' => $data['cliente_id'][$count],
                'data_clipping' => (!empty($exp2[0])) ? $exp2[0] : null,
                'jornal' => (!empty($exp2[1])) ? str_slug($exp2[1]) : null,
                'editoria' => (!empty($exp2[2])) ? str_slug($exp2[2]) : null,
                'fontes' => (!empty($exp2[3])) ? str_slug($exp2[3]) : null,
                'status' => (!empty($exp2[4])) ? str_slug($exp2[4]) : null,
                'centimetragem' => (!empty($exp2[5])) ? str_slug($exp2[5]) : null,
                'usuario_id' =>$data['usuario_id'][$count]
              ];

              $jornal = Clippings::getIdBySlug($array_clipping[$count]['jornal'],'Jornais');
              $jornal = (!is_numeric($jornal)) ? $jornal." no arquivo ->".$nameOriginal : $jornal;

              $editoria = Clippings::EditoriaBelongsToJornal(
                Clippings::getIdBySlug($array_clipping[$count]['jornal'],'Jornais'),
                Clippings::getIdBySlug($array_clipping[$count]['editoria'],'Editorias')
              );
              $editoria = (!is_numeric($editoria)) ? $editoria." no arquivo ->".$nameOriginal : Clippings::getIdBySlug($array_clipping[$count]['editoria'],'Editorias');

              $fonte = Clippings::getIdBySlug($array_clipping[$count]['fontes'],'Fontes');
              $fonte = (!is_numeric($fonte)) ? $fonte." no arquivo ->".$nameOriginal : $fonte;

              $status = Clippings::getIdBySlug($array_clipping[$count]['status'],'Status');
              $status = (!is_numeric($status)) ? $status." no arquivo ->".$nameOriginal : $status;

              $centimetragem = $array_clipping[$count]['centimetragem'];
              $centimetragem = (!is_numeric($centimetragem)) ? $centimetragem." não é numero valido para centimetragem - no arquivo ->".$nameOriginal : $centimetragem;

              $assunto = (isset($array_clipping[$count]['assunto']) && $array_clipping[$count]['assunto']!=null) ? $array_clipping[$count]['assunto'] : $array_clipping[$count]['assunto_id'];
              $data_clipping = (Clippings::formatDataClipping($array_clipping[$count]['data_clipping'])) ? Clippings::formatDataClipping($array_clipping[$count]['data_clipping']) : "data invalida ";

              $array_translate[] = [
                'assunto'=> $assunto,
                'data_clipping' =>$data_clipping,
                'jornal_id' => $jornal,
                'editoria_id' => $editoria,
                'fonte_id' => $fonte,
                'status_id' => $status,
                'centimetragem' => $centimetragem,
                'cliente_id' => $data['cliente_id'][$count],
                'usuario_id' => $data['usuario_id'][$count],
                'image_clipping' => $f
              ];
            $count++;
            endforeach;
          return $array_translate;
        }
    }

    public function transacClipping(Request $request, array $data){
      $count_sucess = 0;
      //dd($data);
      $cliente = str_slug(Clippings::getClienteNameByID($data[0]['cliente_id']));
      $base_path = public_path().DIRECTORY_SEPARATOR.'clippings'.DIRECTORY_SEPARATOR.$cliente.DIRECTORY_SEPARATOR.date('Y-m-d');
      $fake_path = "/clippings/".$cliente."/".date("Y-m-d")."/";
      //dd($data);

      for($i=0;$i<count($data);$i++) {
        //dd($data[$i]);
        if(is_numeric($data[$i]['assunto'])) {
          $data[$i]['assunto_id'] = $data[$i]['assunto'];
          unset($data[$i]['assunto']);
        } else {
          $insertAssunto[$i] = Assuntos::create( [
            'nome'=>$data[$i]['assunto'],
            'slug_name'=>str_slug($data[$i]['assunto']),
            'cliente_id'=>$data[0]['cliente_id'],
            'usuario_id'=>$data[0]['usuario_id']
          ]);

          if ($insertAssunto[$i]) {
            unset($data[$i]['assunto']);

            $data[$i]['assunto_id'] = $insertAssunto[$i]->id;
          }
        }
        //dd(count($request->file('image_clipping')));
        if($i<count($request->file('image_clipping'))) {
          $file = $request->file('image_clipping')[$i];
          $nameOriginal = $file->getClientOriginalName();
          $ext = $file->getClientOriginalExtension();

          $archive = time()+rand(1,200).".".$ext;
          //dd($file);
          $move[$i] = $file->move($base_path,$archive);

          if($move[$i]) {
              $data[$i]['file_image'] = $fake_path.$archive;
              //unset($data[$i]['image_clipping']);
          } else {
            return false;
          }
        }
        unset($data[$i]['image_clipping']);
        //dd($data[$i]); exit;
        $insert[$i] = Clippings::create($data[$i]);
        if ($insert[$i]) {
          $count_sucess++;
        }

      }

      if($count_sucess == count($data)) return true;
      return false;
    }

    public function salvar(Request $request){
    	$data = $request->all();

      $dataFormat2 = $this->uploadClipping($request);
      //$dataF = array_merge($dataFormat2,$dataFormat);
      //dd($dataFormat2);
      $errors = $this->procMsgErrors($dataFormat2);

      if(!empty($errors)) {
        $request->session()->put('status',$errors);
        return redirect()->back();
      }

      $save = $this->transacClipping($request,$dataFormat2);
      if ($save){
          $request->session()->put('success','Salvo com sucesso!');
          $request->session()->forget('params');
          $request->session()->forget('status');
          return redirect('/admin/clipping/escolhe');
      } else {
          $request->session()->put('success','Erro ao salvar!');
          return redirect()->back();
      }
    }

    public function editar(Request $request,$id) {
        $data = Clippings::find($id);

        $editorias = Editorias::all();
        $status = Status::all();
        $fontes = Fontes::all();
        return view('sistemas.clippings.editClippings',compact('data',$data,'editorias',$editorias,'status',$status,'fontes',$fontes));
    }

    public function atualizar(Request $request){
        $data = $request->all();
        $update = Clippings::find($data['id']);
        $data['jornal_id'] = Clippings::getJornalByEditoria($data['editoria_id']);
        $update->update($data);

        if ($update){
            $request->session()->put('msgs','Editado com sucesso!');
            return redirect('/admin/clipping/');
        } else {
            $request->session()->put('msgs','Erro ao editar!');
            return redirect()->back();
        }
    }

    public function ver(Request $request, $id){
        $data = Clippings::find($id);
        return view( 'sistemas.clippings.showClippings', compact('data',$data) );
    }

    public function deletar(Request $request, $id){
        $delete = Clippings::find($id);

        if ($delete){
            $del = unlink (public_path().$delete->file_image);
            $delete = Clippings::destroy($id);
            if($del && $delete){
              $request->session()->put('msgs','Deletado com sucesso!');
              return redirect()->back();
            }
        } else {
            $request->session()->put('msgs','Erro ao deletar!');
            return redirect()->back();
        }
    }
}

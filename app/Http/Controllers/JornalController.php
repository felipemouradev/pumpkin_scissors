<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jornais;

class JornalController extends Controller
{
    //
    public function listar(){
        $data = Jornais::paginate();
        return view('sistemas.jornais.listJornais',compact('data',$data));
    }

    public function criar(){

    	return view('sistemas.jornais.newJornais');
    }

    public function salvar(Request $request){
    	$data = $request->all();
      if(isset($data['nome'])) $data['slug_name'] = str_slug($data['nome']);
    	$save = Jornais::create($data);

    	if ($save){
            $request->session()->put('msgs','Salvo com sucesso!');
            return redirect()->back();
        } else {
            $request->session()->put('msgs','Erro ao salvar!');
            return redirect()->back();
        }
    }

    public function editar(Request $request,$id) {
        $data = Jornais::find($id);
        return view('sistemas.jornais.editJornais',compact('data',$data));
    }

    public function atualizar(Request $request){
        $data = $request->all();
        if(isset($data['nome'])) $data['slug_name'] = str_slug($data['nome']);
        $update = Jornais::find($data['id']);

        $update->update($data);

        if ($update){
            $request->session()->put('msgs','Editado com sucesso!');
            return redirect('/admin/jornal/');
        } else {
            $request->session()->put('msgs','Erro ao editar!');
            return redirect()->back();
        }
    }

    public function ver(Request $request, $id){
        $data = Jornais::find($id);
        return view( 'sistemas.jornais.showJornais', compact('data',$data) );
    }

    public function deletar(Request $request, $id){
        $delete = Jornais::destroy($id);

        if ($delete){
            $request->session()->put('msgs','Deletado com sucesso!');
            return redirect()->back();
        } else {
            $request->session()->put('msgs','Erro ao deletar!');
            return redirect()->back();
        }
    }
}

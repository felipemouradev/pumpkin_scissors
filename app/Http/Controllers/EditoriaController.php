<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Editorias;
use App\Jornais;

class EditoriaController extends Controller
{
    //
    public function listar(){
        $data = Editorias::paginate();
        return view('sistemas.editorias.listEditorias',compact('data',$data));
    }

    public function criar(){
      $jornais = Jornais::all();
    	return view('sistemas.editorias.newEditorias',compact('jornais',$jornais));
    }

    public function salvar(Request $request){
    	$data = $request->all();

      if(isset($data['nome'])) $data['slug_name'] = str_slug($data['nome']);
    	$save = Editorias::create($data);

    	if ($save){
            $request->session()->put('msgs','Salvo com sucesso!');
            return redirect()->back();
        } else {
            $request->session()->put('msgs','Erro ao salvar!');
            return redirect()->back();
        }
    }

    public function editar(Request $request,$id) {
        $data = Editorias::find($id);
        return view('sistemas.editorias.editEditorias',compact('data',$data));
    }

    public function atualizar(Request $request){
        $data = $request->all();
        if(isset($data['nome'])) $data['slug_name'] = str_slug($data['nome']);
        $update = Editorias::find($data['id']);

        $update->update($data);

        if ($update){
            $request->session()->put('msgs','Editado com sucesso!');
            return redirect('/admin/editoria/');
        } else {
            $request->session()->put('msgs','Erro ao editar!');
            return redirect()->back();
        }
    }

    public function ver(Request $request, $id){
        $data = Editorias::find($id);
        return view( 'sistemas.editorias.showEditorias', compact('data',$data) );
    }

    public function deletar(Request $request, $id){
        $delete = Editorias::destroy($id);

        if ($delete){
            $request->session()->put('msgs','Deletado com sucesso!');
            return redirect()->back();
        } else {
            $request->session()->put('msgs','Erro ao deletar!');
            return redirect()->back();
        }
    }
}

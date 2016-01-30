<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fontes;

class FonteController extends Controller
{
    //
    public function listar(){
        $data = Fontes::paginate();
        return view('sistemas.fontes.listFontes',compact('data',$data));
    }

    public function criar(){

    	return view('sistemas.fontes.newFontes');
    }

    public function salvar(Request $request){
    	$data = $request->all();
      if(isset($data['nome'])) $data['slug_name'] = str_slug($data['nome']);
    	$save = Fontes::create($data);

    	if ($save){
            $request->session()->put('msgs','Salvo com sucesso!');
            return redirect()->back();
        } else {
            $request->session()->put('msgs','Erro ao salvar!');
            return redirect()->back();
        }
    }

    public function editar(Request $request,$id) {
        $data = Fontes::find($id);
        return view('sistemas.fontes.editFontes',compact('data',$data));
    }

    public function atualizar(Request $request){
        $data = $request->all();

        if(isset($data['nome'])) $data['slug_name'] = str_slug($data['nome']);

        $update = Fontes::find($data['id']);

        $update->update($data);

        if ($update){
            $request->session()->put('msgs','Editado com sucesso!');
            return redirect('/admin/fonte/');
        } else {
            $request->session()->put('msgs','Erro ao editar!');
            return redirect()->back();
        }
    }

    public function ver(Request $request, $id){
        $data = Fontes::find($id);
        return view( 'sistemas.fontes.showFontes', compact('data',$data) );
    }

    public function deletar(Request $request, $id){
        $delete = Fontes::destroy($id);

        if ($delete){
            $request->session()->put('msgs','Deletado com sucesso!');
            return redirect()->back();
        } else {
            $request->session()->put('msgs','Erro ao deletar!');
            return redirect()->back();
        }
    }
}

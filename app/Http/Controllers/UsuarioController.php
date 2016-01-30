<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Usuarios;

class UsuarioController extends Controller
{
    //
    public function listar(){
        $data = Usuarios::paginate();
        return view('sistemas.usuarios.listUsuarios',compact('data',$data));
    }

    public function criar(){

    	return view('sistemas.usuarios.newUsuarios');
    }

    public function salvar(Request $request){
    	$data = $request->all();
      $data['senha'] = sha1($data['senha']);
      if(isset($data['flAtivo'])) $data['flAtivo'] =1;

    	$save = Usuarios::create($data);

    	if ($save){
            $request->session()->put('msgs','Salvo com sucesso!');
            return redirect()->back();
        } else {
            $request->session()->put('msgs','Erro ao salvar!');
            return redirect()->back();
        }
    }

    public function editar(Request $request,$id) {
        $data = Usuarios::find($id);
        return view('sistemas.usuarios.editUsuarios',compact('data',$data));
    }

    public function atualizar(Request $request){
        $data = $request->all();
        $data['senha'] = sha1($data['senha']);

        $update = Usuarios::find($data['id']);

        $update->update($data);

        if ($update){
            $request->session()->put('msgs','Editado com sucesso!');
            return redirect('/admin/usuario/');
        } else {
            $request->session()->put('msgs','Erro ao editar!');
            return redirect()->back();
        }
    }

    public function ver(Request $request, $id){
        $data = Usuarios::find($id);
        return view( 'sistemas.usuarios.showUsuarios', compact('data',$data) );
    }

    public function deletar(Request $request, $id){
        $delete = produtos::destroy($id);

        if ($delete){
            $request->session()->put('msgs','Deletado com sucesso!');
            return redirect()->back();
        } else {
            $request->session()->put('msgs','Erro ao deletar!');
            return redirect()->back();
        }
    }
}

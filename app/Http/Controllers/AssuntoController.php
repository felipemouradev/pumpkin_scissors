<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Assuntos;
use App\Usuarios;
use App\Clientes;

class AssuntoController extends Controller
{
    //
    public function listar(){
        $data = Assuntos::paginate();
        return view('sistemas.assuntos.listAssuntos',compact('data',$data));
    }

    public function criar(){
      $usuarios = Usuarios::all();
      $clientes = Clientes::all();
    	return view('sistemas.assuntos.newAssuntos',compact('usuarios',$usuarios,'clientes',$clientes));
    }

    public function salvar(Request $request){
    	$data = $request->all();
      if(isset($data['nome'])) $data['slug_name'] = str_slug($data['nome']);
    	$save = Assuntos::create($data);

    	if ($save){
            $request->session()->put('msgs','Salvo com sucesso!');
            return redirect()->back();
        } else {
            $request->session()->put('msgs','Erro ao salvar!');
            return redirect()->back();
        }
    }

    public function editar(Request $request,$id) {
        $data = Assuntos::find($id);
        $usuarios = Usuarios::all();
        $clientes = Clientes::all();
        return view('sistemas.assuntos.editAssuntos',compact('data',$data,'usuarios',$usuarios,'clientes',$clientes));
    }

    public function atualizar(Request $request){
        $data = $request->all();
        if(isset($data['nome'])) $data['slug_name'] = str_slug($data['nome']);
        $update = Assuntos::find($data['id']);

        $update->update($data);

        if ($update){
            $request->session()->put('msgs','Editado com sucesso!');
            return redirect('/admin/assunto/');
        } else {
            $request->session()->put('msgs','Erro ao editar!');
            return redirect()->back();
        }
    }

    public function ver(Request $request, $id){
        $data = Assuntos::find($id);
        return view( 'sistemas.assuntos.showAssuntos', compact('data',$data) );
    }

    public function deletar(Request $request, $id){
        $delete = Assuntos::destroy($id);

        if ($delete){
            $request->session()->put('msgs','Deletado com sucesso!');
            return redirect()->back();
        } else {
            $request->session()->put('msgs','Erro ao deletar!');
            return redirect()->back();
        }
    }
}

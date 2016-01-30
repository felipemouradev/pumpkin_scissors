<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Clientes;

class ClienteController extends Controller
{
    //
    public function listar(){
        $data = Clientes::paginate();
        return view('sistemas.clientes.listClientes',compact('data',$data));
    }

    public function criar(){

    	return view('sistemas.clientes.newClientes');
    }

    public function salvar(Request $request){
    	$data = $request->all();

    	$save = Clientes::create($data);

    	if ($save){
            $request->session()->put('msgs','Salvo com sucesso!');
            return redirect()->back();
        } else {
            $request->session()->put('msgs','Erro ao salvar!');
            return redirect()->back();
        }
    }

    public function editar(Request $request,$id) {
        $data = Clientes::find($id);
        return view('sistemas.clientes.editClientes',compact('data',$data));
    }

    public function atualizar(Request $request){
        $data = $request->all();
        
        $update = Clientes::find($data['id']);

        $update->update($data);

        if ($update){
            $request->session()->put('msgs','Editado com sucesso!');
            return redirect('/admin/cliente/');
        } else {
            $request->session()->put('msgs','Erro ao editar!');
            return redirect()->back();
        }
    }

    public function ver(Request $request, $id){
        $data = Clientes::find($id);
        return view( 'sistemas.clientes.showClientes', compact('data',$data) );
    }

    public function deletar(Request $request, $id){
        $delete = Clientes::destroy($id);

        if ($delete){
            $request->session()->put('msgs','Deletado com sucesso!');
            return redirect()->back();
        } else {
            $request->session()->put('msgs','Erro ao deletar!');
            return redirect()->back();
        }
    }
}

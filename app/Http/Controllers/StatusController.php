<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Status;

class StatusController extends Controller
{
    //
    public function listar(){
        $data = Status::paginate();
        return view('sistemas.status.listStatus',compact('data',$data));
    }

    public function criar(){

    	return view('sistemas.status.newStatus');
    }

    public function salvar(Request $request){
    	$data = $request->all();
      if(isset($data['nome'])) $data['slug_name'] = str_slug($data['nome']);
    	$save = Status::create($data);

    	if ($save){
            $request->session()->put('msgs','Salvo com sucesso!');
            return redirect()->back();
        } else {
            $request->session()->put('msgs','Erro ao salvar!');
            return redirect()->back();
        }
    }

    public function editar(Request $request,$id) {
        $data = Status::find($id);
        return view('sistemas.status.editStatus',compact('data',$data));
    }

    public function atualizar(Request $request){
        $data = $request->all();

        if(isset($data['nome'])) $data['slug_name'] = str_slug($data['nome']);

        $update = Status::find($data['id']);

        $update->update($data);

        if ($update){
            $request->session()->put('msgs','Editado com sucesso!');
            return redirect('/admin/status/');
        } else {
            $request->session()->put('msgs','Erro ao editar!');
            return redirect()->back();
        }
    }

    public function ver(Request $request, $id){
        $data = Status::find($id);
        return view( 'sistemas.status.showStatus', compact('data',$data) );
    }

    public function deletar(Request $request, $id){
        $delete = Status::destroy($id);

        if ($delete){
            $request->session()->put('msgs','Deletado com sucesso!');
            return redirect()->back();
        } else {
            $request->session()->put('msgs','Erro ao deletar!');
            return redirect()->back();
        }
    }
}

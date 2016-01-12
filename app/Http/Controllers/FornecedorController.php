<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fornecedores;

class FornecedorController extends Controller
{
    //

    public function listar(){
        $data = Fornecedores::paginate();
        return view('sistemas.fornecedores.listFornecedores',compact('data',$data));
    }

    public function criar(){
    	return view('sistemas.fornecedores.newFornecedores');
    }

    public function salvar(Request $request){
    	$data = $request->all();

    	$save = Fornecedores::create($data);

    	if ($save){
            $request->session()->put('msgs','Salvo com sucesso!');
            return redirect('/admin/fornecedor/criar');
        } else {
            $request->session()->put('msgs','Erro ao salvar!');
            return redirect('/admin/fornecedor/criar');
        }
    }

    public function editar(Request $request,$PK_fornecedor) {
        $data = Fornecedores::find($PK_fornecedor);
        return view('sistemas.fornecedores.editFornecedores',compact('data',$data));
    }

    public function atualizar(Request $request){
        $data = $request->all();

        $update = Fornecedores::find($data['PK_fornecedor']);

        $update->update($data);

        if ($update){
            $request->session()->put('msgs','Editado com sucesso!');
            return redirect('/admin/fornecedor/');
        } else {
            $request->session()->put('msgs','Erro ao editar!');
            return redirect()->back();
        }
    }

    public function ver(Request $request, $PK_fornecedor){
        $data = Fornecedores::find($PK_fornecedor);
        return view( 'sistemas.fornecedores.showFornecedores', compact('data',$data) );
    }

    public function deletar(Request $request, $PK_fornecedor){
        $delete = Fornecedores::destroy($PK_fornecedor);

        if ($delete){
            $request->session()->put('msgs','Deletado com sucesso!');
            return redirect()->back();
        } else {
            $request->session()->put('msgs','Erro ao deletar!');
            return redirect()->back();
        }
    }
}

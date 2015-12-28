<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fornecedores;

class FornecedorController extends Controller
{
    //

    public function index(){
        $fornecedores = Fornecedores::paginate();
        return view('sistemas.fornecedores.listaFornecedor',compact('fornecedores',$fornecedores));
    }

    public function novo(){
    	return view('sistemas.fornecedores.novoFornecedor');
    }

    public function salvar(Request $request){
    	$data = $request->all();

    	$save = Fornecedores::create($data);

    	if ($save){
            $request->session()->put('msgs','Salvo com sucesso!');
            return redirect('/admin/fornecedores/novo-fornecedor');
        } else {
            $request->session()->put('msgs','Erro ao salvar!');
            return redirect('/admin/fornecedores/novo-fornecedor');
        }
    }

    public function editar($PK_fornecedor) {
        dd($PK_fornecedor);
    }

    public function salvarEdicoes(){

    }

    public function ver($PK_fornecedor){
        dd($PK_fornecedor);   
    }

    public function deletar($PK_fornecedor){
        dd($PK_fornecedor);
    }
}

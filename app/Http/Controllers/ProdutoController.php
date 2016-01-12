<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Fornecedores;
use App\Produtos;

class ProdutoController extends Controller
{
    //
    public function listar(){
        $data = produtos::paginate();
        return view('sistemas.produtos.listProdutos',compact('data',$data));
    }

    public function criar(){
      $data = Fornecedores::all();
    	return view('sistemas.produtos.newProdutos',compact('data',$data));
    }

    public function salvar(Request $request){
    	$data = $request->all();

    	$save = produtos::create($data);

    	if ($save){
            $request->session()->put('msgs','Salvo com sucesso!');
            return redirect('/admin/produto/criar');
        } else {
            $request->session()->put('msgs','Erro ao salvar!');
            return redirect('/admin/produto/criar');
        }
    }

    public function editar(Request $request,$PK_produto) {
        $data = produtos::find($PK_fornecedor);
        return view('sistemas.produtos.editProdutos',compact('data',$data));
    }

    public function atualizar(Request $request){
        $data = $request->all();

        $update = produtos::find($data['PK_produto']);

        $update->update($data);

        if ($update){
            $request->session()->put('msgs','Editado com sucesso!');
            return redirect('/admin/produto/');
        } else {
            $request->session()->put('msgs','Erro ao editar!');
            return redirect()->back();
        }
    }

    public function ver(Request $request, $PK_produto){
        $data = produtos::find($PK_produto);
        return view( 'sistemas.produtos.showProdutos', compact('data',$data) );
    }

    public function deletar(Request $request, $PK_produto){
        $delete = produtos::destroy($PK_fornecedor);

        if ($delete){
            $request->session()->put('msgs','Deletado com sucesso!');
            return redirect()->back();
        } else {
            $request->session()->put('msgs','Erro ao deletar!');
            return redirect()->back();
        }
    }
}

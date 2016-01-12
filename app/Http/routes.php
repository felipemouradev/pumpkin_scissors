<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::get('/', function () {
    $routeCollection = Route::getRoutes();
    //dd($routeCollection);
    return view('admin-lte.login');
});

Route::group(['middleware' => ['web']], function () {
    //

    Route::group([ 'prefix'=>'/admin',['middleware' => [''] ]], function () {

    	//Grupo de rotas
    	Route::group(['prefix'=>'/fornecedor',['middleware' => ['']]], function () {

    		Route::get('/','FornecedorController@listar');
    		Route::get('/criar','FornecedorController@criar');

    		Route::get('/{PK_fornecedor}','FornecedorController@ver');
    		Route::get('/{PK_fornecedor}/deletar','FornecedorController@deletar');
    		Route::get('/{PK_fornecedor}/editar','FornecedorController@editar');

    		Route::post('/atualizar','FornecedorController@atualizar');
    		Route::post('/salvar','FornecedorController@salvar');

    	});

        Route::group(['prefix'=>'/produto',['middleware' => ['']]], function () {

          Route::get('/','ProdutoController@listar');
          Route::get('/criar','ProdutoController@criar');

          Route::get('/{PK_produto}','ProdutoController@ver');
          Route::get('/{PK_produto}/deletar','ProdutoController@deletar');
          Route::get('/{PK_produto}/editar','ProdutoController@editar');

          Route::post('/atualizar','ProdutoController@atualizar');
          Route::post('/salvar','ProdutoController@salvar');

        });

	});

});

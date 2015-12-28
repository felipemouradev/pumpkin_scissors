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
    return view('admin-lte.login');
});

Route::group(['middleware' => ['web']], function () {
    //
    
    Route::group([ 'prefix'=>'/admin',['middleware' => [''] ]], function () {

    	//Grupo de rotas
    	Route::group(['prefix'=>'/fornecedores',['middleware' => ['']]], function () {

    		Route::get('/','FornecedorController@index');
    		Route::get('/novo-fornecedor','FornecedorController@novo');
    		
    		Route::get('/{PK_fornecedor}','FornecedorController@ver');
    		Route::get('/{PK_fornecedor}/deletar','FornecedorController@deletar');
    		Route::get('/{PK_fornecedor}/editar','FornecedorController@editar');

    		Route::post('/{PK_fornecedor}/salva-modificacao','FornecedorController@salvaEdicoes');
    		Route::post('/salvar-novo-fornecedor','FornecedorController@salvar');

    	});
	});

});

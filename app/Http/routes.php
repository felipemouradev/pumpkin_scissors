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

        Route::group(['prefix'=>'/usuarios',['middleware' => ['']]], function () {


            Route::get('/','UsuariosController@listar');
            Route::get('/criar','UsuariosController@criar');
            // Route::get('/',function(){ return view('sistemas.usuarios.listUsuarios'); });
            // Route::get('/novo',function(){ return view('sistemas.usuarios.newUsuarios'); });

        });   

	});

});

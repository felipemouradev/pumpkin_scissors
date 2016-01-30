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
    	Route::group(['prefix'=>'/usuario',['middleware' => ['']]], function () {

    		Route::get('/','UsuarioController@listar');
    		Route::get('/criar','UsuarioController@criar');

    		Route::get('/{id}','UsuarioController@ver');
    		Route::get('/{id}/deletar','UsuarioController@deletar');
    		Route::get('/{id}/editar','UsuarioController@editar');

    		Route::post('/atualizar','UsuarioController@atualizar');
    		Route::post('/salvar','UsuarioController@salvar');

    	});

      Route::group(['prefix'=>'/status',['middleware' => ['']]], function () {

    		Route::get('/','StatusController@listar');
    		Route::get('/criar','StatusController@criar');

    		Route::get('/{id}','StatusController@ver');
    		Route::get('/{id}/deletar','StatusController@deletar');
    		Route::get('/{id}/editar','StatusController@editar');

    		Route::post('/atualizar','StatusController@atualizar');
    		Route::post('/salvar','StatusController@salvar');

    	});

      Route::group(['prefix'=>'/jornal',['middleware' => ['']]], function () {

    		Route::get('/','JornalController@listar');
    		Route::get('/criar','JornalController@criar');

    		Route::get('/{id}','JornalController@ver');
    		Route::get('/{id}/deletar','JornalController@deletar');
    		Route::get('/{id}/editar','JornalController@editar');

    		Route::post('/atualizar','JornalController@atualizar');
    		Route::post('/salvar','JornalController@salvar');

    	});

      Route::group(['prefix'=>'/editoria',['middleware' => ['']]], function () {

    		Route::get('/','EditoriaController@listar');
    		Route::get('/criar','EditoriaController@criar');

    		Route::get('/{id}','EditoriaController@ver');
    		Route::get('/{id}/deletar','EditoriaController@deletar');
    		Route::get('/{id}/editar','EditoriaController@editar');

    		Route::post('/atualizar','EditoriaController@atualizar');
    		Route::post('/salvar','EditoriaController@salvar');

    	});

	});

});

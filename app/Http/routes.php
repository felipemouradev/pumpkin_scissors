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



Route::group(['middleware' => ['web']], function () {
    //
    Route::group(['middleware' => ['check_session']], function () {
      Route::get('/auth/login','AuthController@login');
      Route::post('/auth/auth','AuthController@auth');
    });
    Route::group([ 'prefix'=>'/admin','middleware' => 'authz'  ], function () {
      Route::get('/auth/logout','AuthController@logout');
    	//Grupo de rotas
    	Route::group(['prefix'=>'/usuario'], function () {

        Route::get('/profile','UsuarioController@profile');
        Route::get('/profile/{id}/editar','UsuarioController@profileEditar');

    		Route::get('/','UsuarioController@listar');
    		Route::get('/criar','UsuarioController@criar');

    		Route::get('/{id}','UsuarioController@ver');
    		Route::get('/{id}/deletar','UsuarioController@deletar');
    		Route::get('/{id}/editar','UsuarioController@editar');

    		Route::post('/atualizar','UsuarioController@atualizar');
    		Route::post('/salvar','UsuarioController@salvar');

        Route::get('/profile','UsuarioController@profile');
        Route::get('/profile/{id}/editar','UsuarioController@profileEditar');

    	});

      Route::group(['prefix'=>'/status'], function () {

    		Route::get('/','StatusController@listar');
    		Route::get('/criar','StatusController@criar');

    		Route::get('/{id}','StatusController@ver');
    		Route::get('/{id}/deletar','StatusController@deletar');
    		Route::get('/{id}/editar','StatusController@editar');

    		Route::post('/atualizar','StatusController@atualizar');
    		Route::post('/salvar','StatusController@salvar');

    	});

      Route::group(['prefix'=>'/fonte'], function () {

    		Route::get('/','FonteController@listar');
    		Route::get('/criar','FonteController@criar');

    		Route::get('/{id}','FonteController@ver');
    		Route::get('/{id}/deletar','FonteController@deletar');
    		Route::get('/{id}/editar','FonteController@editar');

    		Route::post('/atualizar','FonteController@atualizar');
    		Route::post('/salvar','FonteController@salvar');

    	});

      Route::group(['prefix'=>'/jornal'], function () {

    		Route::get('/','JornalController@listar');
    		Route::get('/criar','JornalController@criar');

    		Route::get('/{id}','JornalController@ver');
    		Route::get('/{id}/deletar','JornalController@deletar');
    		Route::get('/{id}/editar','JornalController@editar');

    		Route::post('/atualizar','JornalController@atualizar');
    		Route::post('/salvar','JornalController@salvar');

    	});

      Route::group(['prefix'=>'/editoria'], function () {

    		Route::get('/','EditoriaController@listar');
    		Route::get('/criar','EditoriaController@criar');

    		Route::get('/{id}','EditoriaController@ver');
    		Route::get('/{id}/deletar','EditoriaController@deletar');
    		Route::get('/{id}/editar','EditoriaController@editar');

    		Route::post('/atualizar','EditoriaController@atualizar');
    		Route::post('/salvar','EditoriaController@salvar');

    	});

      Route::group(['prefix'=>'/assunto'], function () {

    		Route::get('/','AssuntoController@listar');
    		Route::get('/criar','AssuntoController@criar');

    		Route::get('/{id}','AssuntoController@ver');
    		Route::get('/{id}/deletar','AssuntoController@deletar');
    		Route::get('/{id}/editar','AssuntoController@editar');

    		Route::post('/atualizar','AssuntoController@atualizar');
    		Route::post('/salvar','AssuntoController@salvar');

    	});

      Route::group(['prefix'=>'/cliente'], function () {

    		Route::get('/','ClienteController@listar');
    		Route::get('/criar','ClienteController@criar');

    		Route::get('/{id}','ClienteController@ver');
    		Route::get('/{id}/deletar','ClienteController@deletar');
    		Route::get('/{id}/editar','ClienteController@editar');

    		Route::post('/atualizar','ClienteController@atualizar');
    		Route::post('/salvar','ClienteController@salvar');

    	});

	});

});

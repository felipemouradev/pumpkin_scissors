<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Usuarios;

class AuthController extends Controller
{
    //
    public function auth(Request $request) {
      $data = $request->all();

      if (!empty($data['login'])&&!empty($data['password'])){
        $data['password'] = sha1($data['password']);

        $search = Usuarios::select(['id','login','nome','image_perfil'])
                          ->where('login',$data['login'])
                          ->where('senha',$data['password'])
                          ->where('flAtivo',1)->get()->toArray();
        if (!$search || empty($search)) {
          $request->session()->put('status','Login ou senha inválidos!');
          return redirect()->back();
        }

        $expiration = time()+30*60;
        $options = ['expiration_session'=>$expiration];
        $search = array_merge($search,$options);
        //dd($search);
        $request->session()->put('logado',$search);

        return redirect('/admin/usuario');
      }
    }

    public function logout(Request $request) {
      $request->session()->forget('logado');
      return redirect('/auth/login');
    }
    public function login(){
      return view('admin-lte.login');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class AuthzMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $session = $request->session()->get('logado');
        $slug = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));

        if (empty($session)) {
          $request->session()->put('status','É preciso fazer login para continuar');
          return redirect('/');
        }

        if(time() > $session['expiration_session']) {
          $request->session()->put('status','Sessão expirado, favor faça login novamente');
          return redirect('/');
        } else {
          $session['expiration_session'] = time()+10*60;
        }



        if ($slug[0]=="auth" && !empty($session) && time < $session['expiration_session'] ) return redirect('/admin/usuario');

        return $next($request);
    }
}

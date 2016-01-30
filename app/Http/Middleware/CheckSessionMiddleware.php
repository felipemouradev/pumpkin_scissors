<?php

namespace App\Http\Middleware;

use Closure;

class CheckSessionMiddleware
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

        if ($slug[0]=="auth" && !empty($session) && time() < $session['expiration_session'] ) return redirect('/admin/usuario');

        return $next($request);
    }
}

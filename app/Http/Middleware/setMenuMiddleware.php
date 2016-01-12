<?php

namespace App\Http\Middleware;

use Closure;
use App\Permissoes;

class setMenuMiddleware
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

        $perm = Permissoes::all();
        
        $request->session()->put('menu',$perm);

        return $next($request);
    }
}

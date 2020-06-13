<?php

namespace App\Http\Middleware;

use Closure;

class UserHasStoreMiddleWare
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
         // verificando se o usuario ja tem loja para redirecionar - se o count retornar 1 é true.
         if (auth()->user()->store()->count()) {
            flash('Você já possui uma loja cadastrada.')->warning();
            return redirect()->route('admin.stores.index');
        }

        return $next($request);
    }
}

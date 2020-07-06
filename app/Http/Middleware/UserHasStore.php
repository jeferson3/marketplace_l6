<?php

namespace App\Http\Middleware;

use Closure;

class UserHasStore
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
        if(auth()->user()->store)
        {
            flash('Você já possui uma loja cadastrada')->warning();
            return redirect()->route('stores.index');
        }
        return $next($request);
    }
}

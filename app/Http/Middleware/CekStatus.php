<?php

namespace App\Http\Middleware;

use Closure;


class CekStatus
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
        $username = $request->session()->get('authenticated'); 
        if (!empty(session('authenticated'))) {
        $a = $request->session()->get('authenticated');
       
        return $next($request);
    }

    return redirect('login');
        
        
    }

    }
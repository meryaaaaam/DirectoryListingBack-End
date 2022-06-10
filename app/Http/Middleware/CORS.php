<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CORS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle($request, Closure $next)
    {        
        $response = $next($request)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
            ->header('Access-Control-Allow-Headers', 'Origin, Content-Type, X-Auth-Token, Authorization');
    }
        // header('Acess-Control-Allow-Origin: *');
        // header('Acess-Control-Allow-Origin: Content-type, X-Auth-Token, Authorization, Origin');
        // return $next($request);
    
}
//  return $next($request)
//         ->header('Acess-Control-Allow-Origin','*')
//         ->header('Access-Control-Allow-Methods', '*')
//         ->header('Access-Control-Allow-Credentials', true)
//         ->header('Acess-Control-Allow-Headers', 'X-Requested-With,Content-type, X-Auth-Token, Authorization')
//         ->header('Accept', 'application/json');

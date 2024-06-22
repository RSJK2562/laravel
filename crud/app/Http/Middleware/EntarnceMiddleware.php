<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EntarnceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // echo "Test"; 

        // $input = $request->num;
        // if($input>=100){
        //     return $next($request);
        // }else{
        //     echo "Your request can not be processed";
        //     die;
        // }
        
        if($request->session()->has('uid')){
            return $next($request);
        }else{
            return redirect('loginform')->with('report', 'Enter Username & Password');
        }
    }
}

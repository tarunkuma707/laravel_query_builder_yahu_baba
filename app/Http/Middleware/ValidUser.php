<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ValidUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        echo "<h3 class='text-primary'>We are now in Valid user Middleare".$role."</h3>";
        if(Auth::user()->role==$role){
            return $next($request);
        }
        elseif(Auth::user()->role=="editor"){
            return redirect()->route('inuser');
        }
        else{
            return redirect()->route('login');
        }
    }

    public function terminate(Request $request, Response $response): void
    {
        //echo "<h3 class='text-danger'>We are now terminating Valid User.</h3>";
    }

}

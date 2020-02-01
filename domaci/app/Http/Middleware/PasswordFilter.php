<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;


class PasswordFilter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request){

        }
    }
}
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Route;


class IsSystemAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

     protected $route;
     protected $auth;

     public function __construct(Guard $auth ,Route $route)
     {
        $this->auth=$auth;
        $this->route=$route;

     }


    public function handle(Request $request, Closure $next)
    {
        if ($this->auth->user()->is_sysyem_admin != 1) {
            return new Response('<h1> Access Denied </h1>',401);
        }

        return $next($request);
    }

}

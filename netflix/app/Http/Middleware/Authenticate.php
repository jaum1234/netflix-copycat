<?php

namespace App\Http\Middleware;

use App\service\JsonResponseOutput;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return (new JsonResponseOutput())->set(false, [], "Unauthorized", 401)->output();
        }

        return $next($request);
    }
}

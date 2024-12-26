<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class BasicAuthenticate extends Middleware
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // Define your username and password
        $username = env('BASIC_AUTH_USERNAME');
        $password = env('BASIC_AUTH_PASSWORD');

        // Check for the Basic Auth credentials in the request
        if ($request->getUser() !== $username || $request->getPassword() !== $password) {
            return response('Unauthorized', 401)->header('WWW-Authenticate', 'Basic');
        }

        return $next($request);
    }
}

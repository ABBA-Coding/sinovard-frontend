<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminPanel
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
        $user = Auth::user();

        if ($user && $user->role) {
            $role = $user->role->role;

            if ($role == User::ROLE_ADMIN) {
                return $next($request);
            }
        }
        return redirect()->route('admin.login.show');
    }
}

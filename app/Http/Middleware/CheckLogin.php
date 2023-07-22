<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists('user_admin')) {
            // user value cannot be found in session
            return redirect()->route('admin-login');
        }

        return $next($request);
    }

}

<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginUser
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->exists('user_login')) {
            // user value cannot be found in session
            return redirect()->route('user-login');
        }

        return $next($request);
    }

}

<?php

namespace App\Http\Middleware;

use Closure;


class CheckLoginPersonal
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
        if (!$request->session()->exists('personal_login')) {
            // user value cannot be found in session
            return redirect()->route('personal-login');
        }
        return $next($request);
    }
}

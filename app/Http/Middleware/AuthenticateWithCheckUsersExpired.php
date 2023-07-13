<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class AuthenticateWithCheckUsersExpired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $todayDate = Carbon::now()->toDateString();
        $expiredPassword = auth()->user()->expired_password;
        if ($todayDate >= $expiredPassword) { //jika password expired
            return redirect(route('auth.expired-password'));
        }
        
        return $next($request);
    }
}

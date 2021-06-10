<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        $userType = Auth::user()->type;

        if ($userType !== 'admin') {
            return response()->json(['status' => 'You do not have Admin permissions']);
        }
        return $next($request);
    }
}

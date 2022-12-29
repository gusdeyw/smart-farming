<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class EnsureUserActivated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $users = DB::table('users')
            ->where('email', '=', auth()->user()->email)
            ->where('status', '=', 1)
            ->get();

        if (count($users) < 1) {
            // Auth::logout();
            abort(403, 'Akun Belum Diaktivasi.');
        } else {
            return $next($request);
        }
    }
}

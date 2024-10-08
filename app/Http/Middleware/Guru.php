<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Guru {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) {
        // cek apakah user yang masuk bukan merupakan guru, admin, kepala sekolah, atau tata-usaha
        if (!in_array(auth()->user()->role, [1, 2, 3, 4])) {
            return redirect()->back()->with('fail', "Anda tidak memiliki akses ke halaman tersebut!");
        }

        return $next($request);
    }
}
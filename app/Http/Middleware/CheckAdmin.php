<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login')->withErrors('Vui lòng đăng nhập!');
        }

        if (Auth::user()->type !== 'admin') {
            return redirect()->route('no_permission')->withErrors('Bạn không có quyền truy cập!');
        }

        return $next($request);
    }
}

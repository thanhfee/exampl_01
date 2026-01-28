<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
{
    // Nếu chưa có session xác nhận tuổi và đang không ở trang xác minh
    if (!session('age_verified') && !$request->is('verify-age*')) {
        return redirect()->route('age.verify');
    }

    return $next($request);
}
}

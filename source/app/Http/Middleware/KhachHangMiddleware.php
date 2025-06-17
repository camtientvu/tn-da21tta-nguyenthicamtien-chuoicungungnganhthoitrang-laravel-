<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class KhachHangMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->loai_nguoi_dung === 'khach_hang') {
            return $next($request);
        }
        abort(403, 'Bạn không có quyền truy cập khách.');
    }
}

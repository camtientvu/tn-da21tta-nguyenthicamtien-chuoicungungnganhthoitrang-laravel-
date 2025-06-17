<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class NhanVienGiaoHangMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->loai_nguoi_dung === 'nhan_vien_giao_hang') {
            return $next($request);
        }
        abort(403, 'Bạn không có quyền truy cập giao hàng.');
    }
}

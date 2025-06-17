<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class NhanVienNhaCungCapMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->loai_nguoi_dung === 'nhan_vien_nha_cung_cap') {
            return $next($request);
        }
        abort(403, 'Bạn không có quyền truy cập nhà cung cấp.');
    }
}

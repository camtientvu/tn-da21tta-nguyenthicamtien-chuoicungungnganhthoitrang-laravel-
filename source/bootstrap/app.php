<?php

use App\Http\Middleware\KhachHangMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\NhanVienCongTyMiddleware;
use App\Http\Middleware\NhanVienNhaCungCapMiddleware;
use App\Http\Middleware\NhanVienGiaoHangMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'nhanviencongty' => NhanVienCongTyMiddleware::class,
            'nhanviennhacungcap' => NhanVienNhaCungCapMiddleware::class,
            'nhanviengiaohang' => NhanVienGiaoHangMiddleware::class,
            'khachhang' => KhachHangMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

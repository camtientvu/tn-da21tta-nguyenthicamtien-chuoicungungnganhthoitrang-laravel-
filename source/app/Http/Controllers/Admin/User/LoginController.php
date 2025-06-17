<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.user.login', ['title' => 'Đăng nhập hệ thống', 'subtitle' => 'Vui lòng đăng nhập để tiếp tục']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'regex:/^[a-z0-9_]+$/'
            ],
            'password' => 'required',
        ], [
            'name.required' => 'Tên đăng nhập không được để trống.',
            'name.regex' => 'Tên đăng nhập chỉ chứa chữ thường, số và dấu gạch dưới (không dấu, không khoảng trắng, không chữ hoa).',
            'password.required' => 'Mật khẩu không được để trống.',
        ]);

        $user = User::where('ten', $request->input('name'))->first();

        if ($user && Hash::check($request->input('password'), $user->mat_khau)) {
            Auth::login($user);

            switch ($user->loai_nguoi_dung) {
                case 'nhan_vien_cong_ty':
                    return redirect()->route('congty.home.index');
                case 'nhan_vien_nha_cung_cap':
                    return redirect()->route('nhacungcap.home.index');
                case 'nhan_vien_giao_hang':
                    return redirect()->route('giaohang.home.index');
                case 'khach_hang':
                    return redirect()->route('home.index');
                default:
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Bạn không có quyền truy cập.');
            }
        }

        return redirect()->back()->with('error', 'Thông tin đăng nhập không đúng.');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Đăng xuất thành công!');
    }
}

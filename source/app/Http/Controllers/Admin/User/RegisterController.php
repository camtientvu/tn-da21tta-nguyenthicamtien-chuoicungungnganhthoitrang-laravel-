<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\KhachHang;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('admin.user.register', ['title' => 'Đăng ký tài khoản khách hàng']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'ten' => [
                'required',
                'string',
                'max:255',
                'regex:/^[a-z0-9_]+$/',
                'unique:users,ten',
            ],
            'email' => 'required|email|unique:users,email',
            'mat_khau' => 'required|string|min:6|confirmed',
            'so_dien_thoai' => ['required', 'regex:/^0\d{9}$/'],
            'cccd' => ['required', 'regex:/^\d{12}$/'],

            'dia_chi' => 'nullable|string|max:255',
        ], [
            'ten.required' => 'Tên đăng nhập là bắt buộc.',
            'ten.regex' => 'Tên đăng nhập chỉ gồm chữ thường, số và dấu gạch dưới (không dấu, không viết hoa, không khoảng trắng).',
            'ten.unique' => 'Tên đăng nhập đã tồn tại.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã được sử dụng.',
            'mat_khau.required' => 'Mật khẩu là bắt buộc.',
            'mat_khau.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'mat_khau.confirmed' => 'Mật khẩu xác nhận không khớp.',
            'so_dien_thoai.required' => 'Số điện thoại là bắt buộc.',
            'so_dien_thoai.regex' => 'Số điện thoại phải đúng định dạng (bắt đầu bằng 0 và đủ 10 chữ số).',
            'cccd.required' => 'Căn cước công dân là bắt buộc.',
            'cccd.regex' => 'Căn cước công dân phải đúng định dạng (đủ 12 chữ số).',
        ]);

        $user = User::create([
            'ten' => $request->ten,
            'ho_ten' => $request->ho_ten,
            'cccd' => $request->cccd,
            'email' => $request->email,
            'mat_khau' => Hash::make($request->mat_khau),
            'so_dien_thoai' => $request->so_dien_thoai,
            'dia_chi' => $request->dia_chi,
            'loai_nguoi_dung' => 'khach_hang',
        ]);

        KhachHang::create([
            'id_nguoi_dung' => $user->id
        ]);

        Auth::login($user);

        return redirect()->route('home.index')->with('success', 'Đăng ký thành công!');
    }
}

<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;

class ThongTinCaNhanController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('home.profile', compact('user'));
    }

    public function updateThongTin(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'ho_ten' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'cccd' => ['required', 'regex:/^\d{12}$/', 'unique:users,cccd,' . $user->id],
            'so_dien_thoai' => ['required', 'regex:/^0\d{9}$/', 'unique:users,so_dien_thoai,' . $user->id],
            'dia_chi' => 'nullable|string|max:255',
        ], [
            'ho_ten.required' => 'Họ và tên là bắt buộc.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'email.unique' => 'Email đã được sử dụng.',
            'cccd.required' => 'Căn cước công dân là bắt buộc.',
            'cccd.regex' => 'Căn cước công dân phải đúng định dạng (12 chữ số).',
            'cccd.unique' => 'CCCD đã được sử dụng.',
            'so_dien_thoai.required' => 'Số điện thoại là bắt buộc.',
            'so_dien_thoai.regex' => 'Số điện thoại phải bắt đầu bằng 0 và đủ 10 chữ số.',
            'so_dien_thoai.unique' => 'Số điện thoại đã được sử dụng.',
            'dia_chi.max' => 'Địa chỉ không được vượt quá 255 ký tự.',
        ]);

        $user->ho_ten = $request->ho_ten;
        $user->email = $request->email;
        $user->cccd = $request->cccd;
        $user->so_dien_thoai = $request->so_dien_thoai;
        $user->dia_chi = $request->dia_chi;
        $user->save();

        return back()->with('success', 'Cập nhật thông tin cá nhân thành công.');
    }

    public function updateMatKhau(Request $request)
    {
        $request->validate([
            'mat_khau_cu' => 'required',
            'mat_khau_moi' => 'required|string|min:6|confirmed',
        ], [
            'mat_khau_cu.required' => 'Vui lòng nhập mật khẩu hiện tại.',
            'mat_khau_moi.required' => 'Mật khẩu mới là bắt buộc.',
            'mat_khau_moi.min' => 'Mật khẩu mới phải ít nhất 6 ký tự.',
            'mat_khau_moi.confirmed' => 'Xác nhận mật khẩu mới không khớp.',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->mat_khau_cu, $user->mat_khau)) {
            return back()->with('error', 'Mật khẩu cũ không đúng.');
        }

        $user->mat_khau = Hash::make($request->mat_khau_moi);
        $user->save();

        return back()->with('success', 'Đổi mật khẩu thành công.');
    }

    public function quenMatKhau()
    {
        return view('admin.user.forgot-password');
    }

    public function xuLyQuenMatKhau(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'cccd' => ['required', 'regex:/^\d{12}$/'],
        ], [
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không hợp lệ.',
            'cccd.required' => 'CCCD là bắt buộc.',
            'cccd.regex' => 'CCCD phải đúng định dạng 12 chữ số.',
        ]);

        $user = User::where('email', $request->email)
            ->where('cccd', $request->cccd)
            ->first();

        if (!$user) {
            return back()->with('error', 'Email hoặc CCCD không đúng.');
        }

        $newPassword = Str::random(8);
        $user->mat_khau = Hash::make($newPassword);
        $user->save();

        Mail::raw("Mật khẩu mới của bạn là: $newPassword", function ($message) use ($user) {
            $message->to($user->email)
                ->subject('Cấp lại mật khẩu mới');
        });

        return back()->with('success', 'Mật khẩu mới đã được gửi tới email của bạn.');
    }
}
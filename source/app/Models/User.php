<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users'; // giữ nguyên

    protected $fillable = [
        'ten',
        'ho_ten',
        'email',
        'mat_khau',
        'so_dien_thoai',
        'dia_chi',
        'cccd',
        'loai_nguoi_dung',
        'token_ghi_nho',
    ];

    protected $hidden = [
        'mat_khau',
        'token_ghi_nho',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Quan hệ nếu có
    public function khachHang()
    {
        return $this->hasOne(KhachHang::class, 'id_nguoi_dung');
    }

    public function nhanVienCongTy()
    {
        return $this->hasOne(NhanVienCongTy::class, 'id_nguoi_dung');
    }

    public function nhanVienNhaCungCap()
    {
        return $this->hasOne(NhanVienNhaCungCap::class, 'id_nguoi_dung');
    }

    public function nhanVienGiaoHang()
    {
        return $this->hasOne(NhanVienGiaoHang::class, 'id_nguoi_dung');
    }

    // Kiểm tra loại người dùng
    public function laKhachHang()
    {
        return $this->loai_nguoi_dung === 'khach_hang';
    }

    public function laNhanVienCongTy()
    {
        return $this->loai_nguoi_dung === 'nhan_vien_cong_ty';
    }

    public function laNhanVienNhaCungCap()
    {
        return $this->loai_nguoi_dung === 'nhan_vien_nha_cung_cap';
    }

    public function laNhanVienGiaoHang()
    {
        return $this->loai_nguoi_dung === 'nhan_vien_giao_hang';
    }
}

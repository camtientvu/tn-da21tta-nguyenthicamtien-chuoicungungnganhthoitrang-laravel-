<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonSanXuat extends Model
{
    use HasFactory;

    protected $table = 'don_san_xuat';

    protected $fillable = [
        'ma',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'trang_thai',
        'id_san_pham' // ✅ Thêm vào đây
    ];

    protected $dates = ['ngay_bat_dau', 'ngay_ket_thuc'];

    public function chiTietDonSanXuats()
    {
        return $this->hasMany(ChiTietDonSanXuat::class, 'id_don_san_xuat');
    }

    public function nguyenLieuDonSanXuats()
    {
        return $this->hasMany(NguyenLieuDonSanXuat::class, 'id_don_san_xuat');
    }

    // ✅ Quan hệ với bảng sản phẩm
    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'id_san_pham');
    }
}

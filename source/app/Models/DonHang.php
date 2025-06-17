<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    use HasFactory;

    protected $table = 'don_hang';

    protected $fillable = [
        'ma',
        'id_khach_hang',
        'ten_nguoi_nhan',
        'dia_chi_nhan',
        'sdt',
        'ngay_dat',
        'tong_tien',
        'trang_thai',
        'thanh_toan'
    ];

    // Thêm cast cho trường ngay_dat
    protected $casts = [
        'ngay_dat' => 'date', // hoặc 'datetime' nếu cần giờ
    ];

    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'id_khach_hang');
    }

    public function chiTietDonHangs()
    {
        return $this->hasMany(ChiTietDonHang::class, 'id_don_hang');
    }

    public function donGiaoHangs()
    {
        return $this->hasMany(DonGiaoHang::class, 'id_don_hang');
    }

    public function getTongTien()
    {
        return $this->chiTietDonHang->sum(function ($ctdh) {
            return $ctdh->so_luong * $ctdh->gia;
        });
    }
    public function chiTietDonHang()
    {
        return $this->hasMany(ChiTietDonHang::class, 'id_don_hang');
    }
}

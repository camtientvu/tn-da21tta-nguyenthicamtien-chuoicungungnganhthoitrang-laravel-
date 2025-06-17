<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    use HasFactory;

    protected $table = 'san_pham';
    protected $fillable = ['id_danh_muc', 'ma', 'ten', 'mo_ta', 'gia',  'giamgia', 'trang_thai'];

    public function danhMuc()
    {
        return $this->belongsTo(DanhMuc::class, 'id_danh_muc');
    }

    public function chiTietSanPhams()
    {
        return $this->hasMany(ChiTietSanPham::class, 'id_san_pham');
    }

    public function hinhAnhSanPhams()
    {
        return $this->hasMany(HinhAnhSanPham::class, 'id_san_pham');
    }
    public function getLuotBanAttribute()
    {
        return $this->chiTietSanPhams
            ->flatMap->chiTietDonHangs
            ->filter(function ($ctdh) {
                return $ctdh->donHang && $ctdh->donHang->trang_thai === 'hoan_thanh';
            })
            ->sum('so_luong');
    }
    public function danhGias()
    {
        return $this->hasMany(DanhGia::class, 'id_san_pham');
    }
}

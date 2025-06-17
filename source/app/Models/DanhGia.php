<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DanhGia extends Model
{
    protected $table = 'danh_gia';

    protected $fillable = [
        'id_khach_hang',
        'id_san_pham',
        'so_sao',
        'noi_dung',
        'created_at',
        'updated_at'
    ];

    // Mối quan hệ: DanhGia thuộc về Khách Hàng
    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'id_khach_hang');
    }

    // Mối quan hệ: DanhGia thuộc về Sản Phẩm
    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'id_san_pham');
    }
}

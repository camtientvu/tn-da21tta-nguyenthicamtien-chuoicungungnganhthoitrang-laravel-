<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoTrinhDon extends Model
{
    protected $table = 'lo_trinh_don';
    protected $fillable = ['id_don_giao_hang', 'thoi_gian', 'trang_thai', 'mo_ta', 'id_nhan_vien_giao_hang'];

    public function donGiaoHang()
    {
        return $this->belongsTo(DonGiaoHang::class, 'id_don_giao_hang');
    }

    public function nhanVienGiaoHang()
    {
        return $this->belongsTo(NhanVienGiaoHang::class, 'id_nhan_vien_giao_hang');
    }
}

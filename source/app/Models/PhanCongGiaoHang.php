<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhanCongGiaoHang extends Model
{
    protected $table = 'phan_cong_giao_hang';
    protected $fillable = ['id_don_giao_hang', 'id_nhan_vien_giao_hang', 'ghi_chu', 'thoi_gian_phan_cong'];

    public function donGiaoHang()
    {
        return $this->belongsTo(DonGiaoHang::class, 'id_don_giao_hang');
    }

    public function nhanVienGiaoHang()
    {
        return $this->belongsTo(NhanVienGiaoHang::class, 'id_nhan_vien_giao_hang');
    }
}

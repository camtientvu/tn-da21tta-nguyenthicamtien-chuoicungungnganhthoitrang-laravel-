<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonGiaoHang extends Model
{
    use HasFactory;

    protected $table = 'don_giao_hang';
    protected $fillable = ['ma', 'id_don_hang', 'id_cong_ty_giao_hang', 'ngay_giao', 'trang_thai'];

    public function donHang()
    {
        return $this->belongsTo(DonHang::class, 'id_don_hang');
    }

    public function nhanVienGiaoHang()
    {
        return $this->belongsTo(NhanVienGiaoHang::class, 'id_nhan_vien_giao_hang');
    }
    public function congTyGiaoHang()
    {
        return $this->belongsTo(CongTyGiaoHang::class, 'id_cong_ty_giao_hang');
    }
    public function loTrinhs()
    {
        return $this->hasMany(LoTrinhDon::class, 'id_don_giao_hang');
    }
    public function phanCongs()
    {
        return $this->hasMany(PhanCongGiaoHang::class, 'id_don_giao_hang');
    }
}

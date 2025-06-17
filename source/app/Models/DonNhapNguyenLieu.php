<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonNhapNguyenLieu extends Model
{
    use HasFactory;

    protected $table = 'don_nhap_nguyen_lieu';
    protected $fillable = ['ma', 'id_nha_cung_cap', 'ngay_nhap', 'tong_tien', 'trang_thai'];

    public function nhaCungCap()
    {
        return $this->belongsTo(NhaCungCap::class, 'id_nha_cung_cap');
    }

    public function chiTietNhapNguyenLieus()
    {
        return $this->hasMany(ChiTietNhapNguyenLieu::class, 'id_don_nhap');
    }

    public function loNguyenLieus()
    {
        return $this->hasMany(LoNguyenLieu::class, 'id_don_nhap');
    }
}

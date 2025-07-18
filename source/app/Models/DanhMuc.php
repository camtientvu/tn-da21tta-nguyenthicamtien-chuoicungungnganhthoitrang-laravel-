<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    use HasFactory;

    protected $table = 'danh_muc';
    protected $fillable = ['ten', 'mo_ta', 'trang_thai'];

    public function sanPhams()
    {
        return $this->hasMany(SanPham::class, 'id_danh_muc');
    }
}

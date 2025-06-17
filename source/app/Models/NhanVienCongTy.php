<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVienCongTy extends Model
{
    use HasFactory;

    protected $table = 'nhan_vien_cong_ty';

    protected $fillable = [
        'id_nguoi_dung',
        'vai_tro'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_nguoi_dung');
    }
}

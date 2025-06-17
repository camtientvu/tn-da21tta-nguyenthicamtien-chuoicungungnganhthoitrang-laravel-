<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;

    protected $table = 'khach_hang';

    protected $fillable = [
        'id_nguoi_dung'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_nguoi_dung');
    }
}

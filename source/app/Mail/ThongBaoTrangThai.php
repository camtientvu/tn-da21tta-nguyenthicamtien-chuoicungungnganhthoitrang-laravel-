<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ThongBaoTrangThai extends Mailable
{
    use Queueable, SerializesModels;

    public $noiDung;

    public function __construct($noiDung)
    {
        $this->noiDung = $noiDung;
    }

    public function build()
    {
        return $this->subject('Thông báo về hồ sơ tuyển sinh')
            ->view('emails.trang_thai_thong_bao');
    }
}

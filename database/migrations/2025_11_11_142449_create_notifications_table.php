<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class InformasiBaruNotification extends Notification
{
    use Queueable;

    protected $informasi;

    public function __construct($informasi)
    {
        $this->informasi = $informasi;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'kegiatan' => $this->informasi->kegiatan,
            'tanggal' => $this->informasi->tanggal,
        ];
    }
}

<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class InformasiBaruNotification extends Notification
{
    use Queueable;

    protected $informasi;

    /**
     * Buat notifikasi baru.
     */
    public function __construct($informasi)
    {
        $this->informasi = $informasi;
    }

    /**
     * Tentukan channel pengiriman (kita pakai database).
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Data yang akan disimpan ke tabel notifications.
     */
    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Informasi Kegiatan Baru!',
            'kegiatan' => $this->informasi->kegiatan,
            'tanggal' => $this->informasi->tanggal,
        ];
    }
}

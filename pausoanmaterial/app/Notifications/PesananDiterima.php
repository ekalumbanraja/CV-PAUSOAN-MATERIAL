<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Pengiriman; // Import model Pengiriman

class PengirimanStatusUpdated extends Notification
{
    use Queueable;

    protected $pengiriman;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Pengiriman $pengiriman) // Terima objek Pengiriman sebagai parameter konstruktor
    {
        $this->pengiriman = $pengiriman;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('Status pengiriman untuk pesanan Anda telah diperbarui.')
                    ->line('Status Pengiriman: ' . $this->pengiriman->status)
                    ->action('Lihat Detail Pesanan', url('/orders/' . $this->pengiriman->order_id))
                    ->line('Terima kasih telah menggunakan layanan kami!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'status' => $this->pengiriman->status,
            'order_id' => $this->pengiriman->order_id,
        ];
    }
}

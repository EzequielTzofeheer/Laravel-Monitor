<?php

namespace App\Notifications\Site;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

use App\Models\Check;

class EndpointDownNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(
        protected Check $check
    ) {}

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $user): MailMessage
    {
        $endpoint = $this->check->endpoint;
        $site = $endpoint->site;

        return (new MailMessage)
            ->error()
            ->subject("Erro no site ({$site->url})")
            ->line("Erro ({$this->check->status_code}) no endpoint ({$endpoint->name}).")
            ->action('Ver', route('site.endpoint', $site->id))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

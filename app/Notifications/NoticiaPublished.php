<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Noticia;

class NoticiaPublished extends Notification
{
    use Queueable;

    protected $noticia;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Noticia $noticia)
    {
        $this->noticia = $noticia;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('nUEVA Noticia')
            ->line($notifiable->name . ', Hemos publicado una nueva noticia.')
            ->action($this->noticia->title, route('noticias.show', $this->noticia))
            ->line('Gracias por leernos!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'link' => route('noticias.show', $this->noticia->id),
            'text' => "Una nueva Noticia se ha publicado - " . $this->noticia->title
        ];
    }
}

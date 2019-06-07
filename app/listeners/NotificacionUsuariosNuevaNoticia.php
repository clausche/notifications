<?php

namespace App\Listeners;

use App\User;
use App\Events\NotiCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NoticiaPublished;

class NotificacionUsuariosNuevaNoticia
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NotiCreated  $event
     * @return void
     */
    public function handle(NotiCreated $event)
    {
        $users = User::all();

        Notification::send($users, new NoticiaPublished($event->noticia));
    }
}

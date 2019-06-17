<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use App\Events\NotiCreated;
use App\Listeners\NotificacionUsuariosNuevaNoticia;
use App\Events\PostCreated;
use App\listeners\NotifyUserAboutNewPost;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NotiCreated::class => [
            NotificacionUsuariosNuevaNoticia::class
        ],
        PostCreated::class => [
            NotifyUserAboutNewPost::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}

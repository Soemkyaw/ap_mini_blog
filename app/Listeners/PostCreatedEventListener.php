<?php

namespace App\Listeners;

use App\Mail\PostStored;
use App\Events\PostCreatedEvent;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostCreatedEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreatedEvent $event): void
    {
        Mail::to('koko@gmail.com')->send(new PostStored($event->post));
    }
}

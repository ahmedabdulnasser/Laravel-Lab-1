<?php

namespace App\Listeners;

use App\Events\CreateNewPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreasePostCount
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
    public function handle(CreateNewPost $event): void
    {
        $event->post->user()->increment('posts_count');
    }
}

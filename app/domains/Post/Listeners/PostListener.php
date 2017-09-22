<?php

namespace desabafai\domains\Post\Listeners;

use desabafai\domains\Denunciation\Events\DenunciationCreate;
use desabafai\domains\Post\Events\PostCreate;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class PostListener
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
     * @param  Event  $event
     * @return void
     */
    public function handle(PostCreate $event)
    {

    }
}

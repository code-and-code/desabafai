<?php

namespace desabafai\core\Providers;

use desabafai\domains\Denunciation\Events\DenunciationCreate;
use desabafai\domains\Denunciation\Listeners\DenunciationDelete;
use desabafai\domains\Post\Events\PostCreate;
use desabafai\domains\Post\Listeners\PostListener;
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

        DenunciationCreate::class => [ DenunciationDelete::class ],
        PostCreate::class => [PostListener::class]
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

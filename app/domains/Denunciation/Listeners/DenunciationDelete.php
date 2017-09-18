<?php

namespace desabafai\domains\Denunciation\Listeners;

use desabafai\domains\Denunciation\Events\DenunciationCreate;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DenunciationDelete
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
    public function handle(DenunciationCreate $event)
    {
        $model = $event->denunciation->denunciationable;
        if($model->Denunciations->count() > 3)
        {
            $model->delete();
        }
    }
}

<?php

namespace desabafai\domains\Denunciation\Events;

use desabafai\domains\Denunciation\Denunciation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class DenunciationCreate
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $denunciation;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Denunciation $denunciation)
    {
        $this->denunciation = $denunciation;
    }

}

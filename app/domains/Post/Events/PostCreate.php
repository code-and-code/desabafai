<?php

namespace desabafai\domains\Post\Events;

use desabafai\domains\Post\Post;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PostCreate implements ShouldBroadcast
{
    use SerializesModels;

    public $post;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function broadcastOn()
    {
        return ['post_channel'];
    }

    public function broadcastWith()
    {
        return ['post' => $this->post->id];
    }

}

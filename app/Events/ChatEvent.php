<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user1;
    public $user2;
    public $message;


    public function __construct($user1, $user2, $message)
    {
        $this->user1 = $user1;
        $this->user2 = $user2;
        $this->message = $message;
    }

    public function broadcastOn()
    {
        $channel = $this->user1."".$this->user2;
        $name = str_split($this->user1."".$this->user2);
        sort($name);

        // return [$channel];
        return [join("",$name)];
        
    }

    public function broadcastAs()
    {
        return 'my-event';
    }
}

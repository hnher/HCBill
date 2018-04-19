<?php

namespace App\Events;

use App\Model\Handle;
use App\Model\Users;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Support\Facades\Hash;

class LogsShipped
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $request;

    public $operating_id;

    public $status_id;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($request, $status_id, $operating_id)
    {
        $this->request = $request;

        $this->operating_id = $operating_id;

        $this->status_id = $status_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

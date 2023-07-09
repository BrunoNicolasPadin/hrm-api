<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class StatusBookingUpdated implements ShouldBroadcast
{
    public int $id;

    public string $status;

    /**
     * Create a new event instance.
     */
    public function __construct(int $id, string $status)
    {
        $this->id = $id;
        $this->status = $status;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('status-update'),
        ];
    }
}

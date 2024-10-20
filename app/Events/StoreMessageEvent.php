<?php

namespace App\Events;

use App\Http\Resources\Message\MessageResource;
use App\Http\Resources\Message\MessageToOthersResource;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class StoreMessageEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    private $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('store-message.'.$this->message->chat_id);
    }

    public function broadcastAs(): string
    {
        return 'store-message';
    }

    public function broadcastWith(): array
    {
        return [
            'message' => MessageToOthersResource::make($this->message)->resolve()
        ];
    }
}

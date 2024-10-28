<?php

namespace App\Http\Resources\Chat;

use App\Http\Resources\Message\MessageResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'users' => $this->users,
            'last_message' => MessageResource::make($this->lastMessage), // 23  4.50 min
            'unreadable_count' => $this->unreadable_message_statuses_count
        ];
    }
}

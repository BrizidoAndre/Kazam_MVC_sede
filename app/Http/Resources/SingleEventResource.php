<?php

namespace App\Http\Resources;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Event */
class SingleEventResource extends JsonResource
{
    public static $wrap = false;
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'date' => $this->date,

            'channels' => ChannelResource::collection($this->whenLoaded('channels')),
            'tickets' => EventTicketResource::collection($this->whenLoaded('eventTickets')),
        ];
    }
}

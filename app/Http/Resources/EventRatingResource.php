<?php

namespace App\Http\Resources;

use App\Models\EventRating;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin EventRating */
class EventRatingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'rating' => $this->rating,
            'created_at' => $this->created_at,

            'attendee_id' => $this->attendee_id,
            'event_id' => $this->event_id,

            'attendee' => new AttendeeResource($this->whenLoaded('attendee')),
            'event' => new EventResource($this->whenLoaded('event')),
        ];
    }
}

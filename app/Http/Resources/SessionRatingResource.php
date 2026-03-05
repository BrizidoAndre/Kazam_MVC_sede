<?php

namespace App\Http\Resources;

use App\Models\SessionRating;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin SessionRating */
class SessionRatingResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'rating' => $this->rating,
            'created_at' => $this->created_at,

            'attendee_id' => $this->attendee_id,
            'session_id' => $this->session_id,

            'attendee' => new AttendeeResource($this->whenLoaded('attendee')),
            'session' => new SessionResource($this->whenLoaded('session')),
        ];
    }
}

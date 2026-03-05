<?php

namespace App\Http\Resources;

use App\Models\Registration;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Registration */
class RegistrationResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'registration_time' => $this->registration_time,

            'attendee_id' => $this->attendee_id,
            'ticket_id' => $this->ticket_id,

            'attendee' => new AttendeeResource($this->whenLoaded('attendee')),
            'ticket' => new EventTicketResource($this->whenLoaded('ticket')),
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiRegistrationsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'event' => [
                'id' => $this->ticket->event->id,
                'name' => $this->ticket->event->name,
                'slug' => $this->ticket->event->slug,
                'date' => $this->ticket->event->date,
                'organizer' => [
                    'id' => $this->ticket->event->organizer->id,
                    'name' => $this->ticket->event->organizer->name,
                    'slug' => $this->ticket->event->organizer->slug,
                ],
            ],
            'session_ids' => $this->sessionRegistrations->pluck('id'),
        ];
    }
}

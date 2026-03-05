<?php

namespace App\Http\Resources;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Event */
class EventResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'date' => $this->date->format('Y-m-d'),
            'concluded' => $this->when(true, function () {
                return $this->date->isPast();
            }),
            'organizer' => new OrganizerResource($this->whenLoaded('organizer')),
        ];
    }
}

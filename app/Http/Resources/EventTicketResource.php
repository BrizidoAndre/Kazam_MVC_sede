<?php

namespace App\Http\Resources;

use App\Models\EventTicket;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin EventTicket */
class EventTicketResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'special_validity' => null,
            'cost' => $this->cost,
            'available' => true,
        ];
    }
}

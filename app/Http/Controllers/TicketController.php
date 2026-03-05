<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventTicketRequest;
use App\Models\Event;
use App\Models\EventTicket;

class TicketController extends Controller
{
    public function index(Event $model)
    {
        return view('tickets.create', [
            'model' => $model
        ]);
    }

    public function store(EventTicketRequest $request, Event $model)
    {
        EventTicket::create([
            ...$request->validated(),
            'event_id' => $model->id,
        ]);
        session()->flash('info', 'Ticket successfully created');
        return redirect()->route('event.detail', $model);
    }
}

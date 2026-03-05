<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoomRequest;
use App\Models\Event;
use App\Models\Room;

class RoomController extends Controller
{
    public function index(Event $model)
    {
        return view('rooms.create', [
            'model' => $model
        ]);
    }

    public function store(RoomRequest $request, Event $model)
    {
        Room::create($request->validated());
        session()->flash('info', 'Room successfully created');
        return redirect()->route('event.detail', $model);
    }
}

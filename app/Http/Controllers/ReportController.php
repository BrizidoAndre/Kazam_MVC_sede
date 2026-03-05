<?php

namespace App\Http\Controllers;

use App\Models\Event;

class ReportController extends Controller
{
    public function index(Event $model)
    {
        $model->load('channels.rooms.sessions.sessionRegistrations.registration');
        return view('reports.index', [
            'model' => $model
        ]);
    }
}

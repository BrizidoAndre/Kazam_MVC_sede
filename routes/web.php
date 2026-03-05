<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

// routes without authentification
Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('logon');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // routing events actions
    Route::get('event', [EventController::class, 'index'])->name('event.index');
    Route::get('event/create', [EventController::class, 'create'])->name('event.create');
    Route::post('event/create', [EventController::class, 'store'])->name('event.store');

    Route::middleware('mine')->group(function () {
        Route::get('event/detail/{model}', [EventController::class, 'detail'])->name('event.detail');
        Route::get('event/edit/{model}', [EventController::class, 'edit'])->name('event.edit');
        Route::put('event/edit/{model}', [EventController::class, 'update'])->name('event.update');
        // routing other actoins

//    routeing channels
        Route::get('event/{model}/channel/create', [ChannelController::class, 'index'])->name('channel.index');
        Route::post('event/{model}/channel/create', [ChannelController::class, 'store'])->name('channel.store');


//    routeing Rooms
        Route::get('event/{model}/room/create', [RoomController::class, 'index'])->name('room.index');
        Route::post('event/{model}/room/create', [RoomController::class, 'store'])->name('room.store');

//    routing sessions
        Route::get('event/{model}/session/create', [SessionController::class, 'create'])->name('session.create');
        Route::post('event/{model}/session/create', [SessionController::class, 'store'])->name('session.store');
        Route::get('event/{model}/session/edit/{session}', [SessionController::class, 'edit'])->name('session.edit');
        Route::put('event/{model}/session/edit/{session}', [SessionController::class, 'update'])->name('session.update');

        //    Routing tickets
        Route::get('event/{model}/ticket/create', [TicketController::class, 'index'])->name('ticket.create');
        Route::post('event/{model}/ticket/create', [TicketController::class, 'store'])->name('ticket.store');

        Route::get('/reports/{model}', [\App\Http\Controllers\ReportController::class, 'index'])->name('report.index');
    });
});

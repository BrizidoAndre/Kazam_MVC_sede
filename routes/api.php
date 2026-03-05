<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiEventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// setting unauthenticated routes
Route::get('/events', [ApiEventController::class, 'index']);
Route::get('/organizers/{organizer_slug}/events/{event_slug}', [ApiEventController::class, 'view']);
Route::get('/organizers/{organizer_slug}/events/{event_slug}/registration', [ApiEventController::class, 'register']);
Route::any('/login', [ApiAuthController::class, 'login']);
Route::any('/logout', [ApiAuthController::class, 'logout']);
Route::any('/registrations', [ApiAuthController::class, 'registrations']);

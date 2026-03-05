<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CurrentEventMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $model = request('model');
        if ($model?->organizer_id === auth()->id()) {
            return $next($request);
        }
        abort(403, 'Event does not belong to you');
    }
}

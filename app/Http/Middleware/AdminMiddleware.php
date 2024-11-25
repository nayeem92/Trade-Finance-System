<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    // app/Http/Middleware/AdminMiddleware.php
public function handle(Request $request, Closure $next)
{
    Log::info('AdminMiddleware: Checking if user is an admin');

    if (auth()->check() && auth()->user()->user_type !== 'admin') {
        Log::info('User is not an admin, redirecting...');
        // Redirect to a more specific dashboard, e.g., applicant dashboard
        return redirect()->route('dashboard.applicant');
    }

    return $next($request);
}

}

<?php

namespace App\Http\Middleware;

use App\Events\UserActivityLogged;
use Closure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogUserActivityMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Proses request
        $response = $next($request);

        $postdate = now();
        $page = $request->path();
        $method = $request->method();
        $ip = $request->ip();
        $requestBody = $request->all(); // Data request yang dikirim oleh pengguna
        $errors = session('errors') ? session('errors')->all() : [];

        // Kirim event untuk mencatat aktivitas
        event(new UserActivityLogged( $postdate, $page, $method, $ip, $requestBody, $errors));

        return $response;
    }
}

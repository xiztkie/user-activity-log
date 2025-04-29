<?php

namespace App\Listeners;

use App\Events\UserActivityLogged;
use App\Models\UserActivity;

class LogUserActivity
{
    public function handle(UserActivityLogged $event)
    {
        // Simpan data aktivitas menggunakan ORM
        UserActivity::create([
            'user' => $event->user,
            'postdate' => $event->postdate,
            'page' => $event->page,
            'method' => $event->method,
            'ip' => $event->ip,
            'request_body' => $event->requestBody,
            'errors' => $event->errors,
        ]);
    }
}

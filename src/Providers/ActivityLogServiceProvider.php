<?php

namespace epenthink\UserActivityLog\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use epenthink\UserActivityLog\Events\UserActivityEvent;
use epenthink\UserActivityLog\Listeners\LogUserActivityListener;

class ActivityLogServiceProvider extends ServiceProvider
{
    /**
     * Daftarkan layanan dalam aplikasi.
     *
     * @return void
     */
    public function register()
    {
        // Menambahkan konfigurasi atau binding service container (jika ada)
    }

    /**
     * Lakukan booting layanan.
     *
     * @return void
     */
    public function boot()
    {
        // Memastikan event dan listener terdaftar
        Event::listen(
            UserActivityEvent::class,
            LogUserActivityListener::class
        );

        // Publish file migrasi jika ada
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../database/migrations' => database_path('migrations'),
            ], 'migrations');
        }
    }
}

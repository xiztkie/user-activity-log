<?php

namespace epenthink\UserActivityLog\Providers;

use Illuminate\Support\ServiceProvider;

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

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../../database/migrations' => database_path('migrations'),
            ], 'migrations');

            $this->publishes([
                __DIR__.'/../../src/Events' => app_path('Events'),
                __DIR__.'/../../src/Http/Middleware' => app_path('Http/Middleware'),
                __DIR__.'/../../src/Listeners' => app_path('Listeners'),
                __DIR__.'/../../src/Models' => app_path('Models'),
                __DIR__.'/../../src/Providers' => app_path('Providers'),
            ], 'app');
        }
    }


}

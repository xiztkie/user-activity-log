<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('user_activities', function (Blueprint $table) {
            $table->id(); // Kolom ID, primary key
            $table->string('user')->nullable(); // Kolom user_id, nullable jika pengguna tidak login
            $table->timestamp('postdate')->useCurrent(); // Waktu akses saat event dicatat
            $table->string('page'); // Halaman yang diakses
            $table->string('method'); // HTTP method (GET, POST, PUT, dll.)
            $table->string('ip'); // IP address pengguna
            $table->json('request_body'); // Data body request dalam format JSON
            $table->json('errors')->nullable(); // Error yang terjadi, nullable jika tidak ada error
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_activities');
    }
};

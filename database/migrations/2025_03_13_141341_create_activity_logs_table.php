<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Bisa null jika aktivitas bukan dari user
            $table->string('action'); // Jenis aktivitas (misal: login, update profile)
            $table->text('description')->nullable(); // Deskripsi aktivitas
            $table->ipAddress('ip_address')->nullable(); // IP pengguna
            $table->string('user_agent')->nullable(); // Informasi device/browser
            $table->json('data')->nullable(); // Menyimpan data tambahan dalam format JSON
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};

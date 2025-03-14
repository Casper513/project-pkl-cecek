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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->time('jam_masuk');
            $table->time('jam_pulang');
            $table->decimal('longitude', 11, 8);
            $table->decimal('latitude', 10, 8);
            $table->string('lokasi');
            $table->integer('radius'); // Bisa diganti ke decimal jika butuh desimal
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};

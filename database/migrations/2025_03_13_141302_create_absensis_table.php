<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Tambahkan ini untuk DB::raw()

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('tgl_absen');
            $table->time('jam_absen');
            $table->enum('status', ['hadir', 'tidak hadir', 'izin', 'terlambat', 'sakit'])->default('tidak hadir');
            $table->string('file_foto')->nullable(false);
            $table->string('lokasi')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('longitud')->nullable();
            $table->string('latitud')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};

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
        Schema::create('appointsments', function (Blueprint $table) { //Untuk mencatat janji temu/perbaikan kendaraan
            $table->id(); // Secara default id() membuat kolom BIGINT
            $table->foreignId('vehicle_id')->constrained()->onDelete('cascade');
            $table->foreignId('mechanic_id')->constrained('users')->onDelete('cascade');
            $table->dateTime('appointment_date');
            $table->enum('status', ['pending', 'in_progress', 'completed', 'cancelled']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointsments');
    }
};

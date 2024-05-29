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
        Schema::create('sensor_data', function (Blueprint $table) {
            $table->id();
            $table->string('sensor_type'); // Tipe sensor: DHT11, MQ5, RainSensor
            $table->float('value'); // Nilai yang diukur oleh sensor
            $table->timestamps(); // Waktu pengukuran (created_at dan updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensor_data');
    }
};

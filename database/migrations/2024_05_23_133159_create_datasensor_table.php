<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('datasensor', function (Blueprint $table) {
            $table->id();
            $table->integer('sensor_id');
            $table->string('sensor_name');
            $table->double('value');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('datasensor');
    }
};

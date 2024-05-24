<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
            Schema ::create('devices', function (Blueprint $table) {
            $table ->id();
            $table ->string('device_name');
            $table ->string('device_type');
            $table ->integer('current_value');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};

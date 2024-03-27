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
        Schema::create('drones', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('drone_type_id')->nullable();
            $table->foreign('drone_type_id')->references('id')->on('parameters');

            $table->unsignedBigInteger('airframe_id')->nullable();
            $table->foreign('airframe_id')->references('id')->on('parameters');

            $table->unsignedBigInteger('manufacturer_id')->nullable();
            $table->foreign('manufacturer_id')->references('id')->on('parameters');

            $table->string('name');
            $table->string('serial_number');
            $table->string('registration_number');
            $table->timestamp('warranty_period')->nullable();
            $table->string('hour_used')->default("00:00");
            $table->string('minute_used')->default("00:00");
            $table->string('image_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drones');
    }
};

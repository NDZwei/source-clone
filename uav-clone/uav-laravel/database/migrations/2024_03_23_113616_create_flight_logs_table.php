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
        Schema::create('flight_logs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id')->references('id')->on('persons');

            $table->unsignedBigInteger('drone_id');
            $table->foreign('drone_id')->references('id')->on('drones');

            $table->unsignedBigInteger('flight_purpose_id')->nullable();
            $table->foreign('flight_purpose_id')->references('id')->on('parameters');

            $table->unsignedBigInteger('flight_method_id')->nullable();
            $table->foreign('flight_method_id')->references('id')->on('parameters');

            $table->unsignedBigInteger('no_fly_zone_method_id')->nullable();
            $table->foreign('no_fly_zone_method_id')->references('id')->on('parameters');

            $table->unsignedBigInteger('takeoff_location_id')->nullable();
            $table->foreign('takeoff_location_id')->references('id')->on('administrative_unit');

            $table->unsignedBigInteger('landing_place_id')->nullable();
            $table->foreign('landing_place_id')->references('id')->on('administrative_unit');

            //flight method
            $table->timestamp('flight_date');
            $table->string('flight_path');
            $table->string('takeoff_location_detail')->nullable();
            $table->string('takeoff_time')->nullable();
            $table->string('landing_place_detail')->nullable();
            $table->string('landing_time')->nullable();
            $table->string('flight_time')->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flight_logs');
    }
};

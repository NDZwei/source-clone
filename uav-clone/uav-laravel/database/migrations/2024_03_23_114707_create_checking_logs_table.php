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
        Schema::create('checking_logs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id')->references('id')->on('persons');

            $table->unsignedBigInteger('drone_id');
            $table->foreign('drone_id')->references('id')->on('drones');

            $table->timestamp('checked_date')->nullable();
            $table->boolean('whole_airframe')->default(false);
            $table->boolean('propeller')->default(false);
            $table->boolean('flame')->default(false);
            $table->boolean('communication_system')->default(false);
            $table->boolean('propulsion_system')->default(false);
            $table->boolean('power_system')->default(false);
            $table->boolean('automatic_control_system')->default(false);
            $table->boolean('control_device')->default(false);
            $table->boolean('gps_gnss')->default(false);
            $table->boolean('remote_equipment')->default(false);
            $table->boolean('light')->default(false);
            $table->boolean('camera')->default(false);
            $table->boolean('verifier')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checking_logs');
    }
};

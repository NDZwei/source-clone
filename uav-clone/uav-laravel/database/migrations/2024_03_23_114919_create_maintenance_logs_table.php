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
        Schema::create('maintenance_logs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id')->references('id')->on('persons');

            $table->unsignedBigInteger('drone_id');
            $table->foreign('drone_id')->references('id')->on('drones');

            $table->unsignedBigInteger('maintenance_place_id');
            $table->foreign('maintenance_place_id')->references('id')->on('administrative_unit');

            $table->timestamp('repair_date')->nullable();
            $table->string('category_repair')->nullable();
            $table->string('content_repair')->nullable();
            $table->string('reason_repair')->nullable();
            $table->string('anomaly_report')->nullable();
            $table->string('confirmer')->nullable();
            $table->string('maintenance_place_detail')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_logs');
    }
};

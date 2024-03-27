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
        Schema::create('persons', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('administrative_unit_id')->nullable();
            $table->foreign('administrative_unit_id')->references('id')->on('administrative_unit');

            $table->string('display_name')->nullable();
            $table->timestamp('birthdate')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address_detail')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('hour_used')->nullable()->default("00:00");
            $table->string('minute_used')->nullable()->default("00:00");


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};

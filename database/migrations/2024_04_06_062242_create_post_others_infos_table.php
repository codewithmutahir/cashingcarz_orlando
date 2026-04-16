<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_others_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id');
            $table->string('car_mileage')->nullable();
            $table->string('car_title')->nullable();
            $table->string('car_title_clear')->nullable();
            $table->string('car_pickup_point')->nullable();
            $table->string('car_owner')->nullable();
            $table->string('car_wheels')->nullable();
            $table->string('car_battery')->nullable();
            $table->string('car_start')->nullable();
            $table->string('car_condition')->nullable();
            $table->string('car_exterior_damage')->nullable();
            $table->string('car_exterior_missing')->nullable();
            $table->string('car_catalytic')->nullable();
            $table->string('car_interior')->nullable();
            $table->string('car_flood')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_others_infos');
    }
};

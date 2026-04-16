<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('referrals', function (Blueprint $table) {
        $table->id();
        $table->string('first_name');
        $table->string('email');
        $table->string('phone');
        $table->string('year_name')->nullable();
        $table->string('brand_name')->nullable();
        $table->string('model_name')->nullable();
        $table->string('sub_model_name')->nullable();
        $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
        $table->string('status')->default('New');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('referrals');
    }
};

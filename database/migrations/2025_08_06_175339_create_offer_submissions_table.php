<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('offer_submissions', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('post_id');
    $table->unsignedBigInteger('customer_id');
    $table->string('email');
    $table->decimal('offer_price', 10, 2);
    $table->string('reference_number');
    $table->timestamps();

    $table->foreign('post_id')->references('id')->on('posts');
    $table->foreign('customer_id')->references('id')->on('users');
});

    }

    public function down(): void
    {
        Schema::dropIfExists('offer_submissions');
    }
};

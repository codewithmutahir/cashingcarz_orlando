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
        Schema::table('referrals', function (Blueprint $table) {
            $table->string('referrer_email')->nullable();
            $table->string('referrer_phone')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('referrals', function (Blueprint $table) {
            $table->dropColumn(['referrer_email', 'referrer_phone']);
        });
    }

};

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
            Schema::table('referrals', function (Illuminate\Database\Schema\Blueprint $table) {
                $table->string('year_name')->nullable();
                $table->string('brand_name')->nullable();
                $table->string('model_name')->nullable();
                $table->string('sub_model_name')->nullable();
            });
        }
        
        public function down()
        {
            Schema::table('referrals', function (Illuminate\Database\Schema\Blueprint $table) {
                $table->dropColumn(['year_name', 'brand_name', 'model_name', 'sub_model_name']);
            });
        }

};

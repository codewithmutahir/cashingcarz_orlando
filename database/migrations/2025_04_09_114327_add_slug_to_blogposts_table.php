<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSlugToBlogpostsTable extends Migration
{
    public function up()
    {
        // If the table already exists, do not try to create it again
        // Schema::create('blogposts', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('title');
        //     $table->longText('description');
        //     $table->string('photo');
        //     $table->timestamps();
        // });

        // Add the slug column
         if (!Schema::hasColumn('blogposts', 'slug')) {
        Schema::table('blogposts', function (Blueprint $table) {
            $table->string('slug')->unique()->after('title');
        });
    }
    }

    public function down()
    {
        // Drop the slug column if needed for rollback
        Schema::table('blogposts', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
}

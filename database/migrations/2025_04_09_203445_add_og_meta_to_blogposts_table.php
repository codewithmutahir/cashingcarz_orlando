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
    Schema::table('blogposts', function (Blueprint $table) {
        // Check if each column exists before attempting to add it
        if (!Schema::hasColumn('blogposts', 'og_title')) {
            $table->string('og_title')->nullable();
        }
        if (!Schema::hasColumn('blogposts', 'og_description')) {
            $table->text('og_description')->nullable();
        }
        if (!Schema::hasColumn('blogposts', 'og_image')) {
            $table->string('og_image')->nullable();
        }
        if (!Schema::hasColumn('blogposts', 'og_type')) {
            $table->string('og_type')->nullable();
        }
        if (!Schema::hasColumn('blogposts', 'og_url')) {
            $table->string('og_url')->nullable();
        }

        // Check for meta columns
        if (!Schema::hasColumn('blogposts', 'meta_title')) {
            $table->string('meta_title')->nullable();
        }
        if (!Schema::hasColumn('blogposts', 'meta_description')) {
            $table->text('meta_description')->nullable();
        }
        if (!Schema::hasColumn('blogposts', 'meta_keywords')) {
            $table->text('meta_keywords')->nullable();
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('blogposts', function (Blueprint $table) {
            // Drop the new meta columns
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_description');
            $table->dropColumn('meta_keywords');

            // Drop the OG columns
            $table->dropColumn('og_title');
            $table->dropColumn('og_description');
            $table->dropColumn('og_image');
            $table->dropColumn('og_type');
            $table->dropColumn('og_url');
        });
    }
};

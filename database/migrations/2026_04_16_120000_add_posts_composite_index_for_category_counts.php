<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Speeds up nested-set category post counts (country + category + visibility filters).
 */
return new class extends Migration
{
	public function up(): void
	{
		Schema::table('posts', function (Blueprint $table) {
			$table->index(
				['country_code', 'category_id', 'archived_at', 'deleted_at'],
				'posts_country_category_archived_deleted_index'
			);
		});
	}

	public function down(): void
	{
		Schema::table('posts', function (Blueprint $table) {
			$table->dropIndex('posts_country_category_archived_deleted_index');
		});
	}
};

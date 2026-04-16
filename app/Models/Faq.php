<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

	protected static function booted(): void
	{
		$forget = static function (): void {
			cache()->forget('faq.all');
		};
		static::saved($forget);
		static::deleted($forget);
	}
}

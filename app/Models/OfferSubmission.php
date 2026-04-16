<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferSubmission extends Model
{
    use HasFactory;

    protected $table = 'offer_submissions'; // ✅ Exact table name
    protected $fillable = [
        'post_id',
        'customer_id',
        'email',
        'offer_price',
        'reference_number',
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }
}

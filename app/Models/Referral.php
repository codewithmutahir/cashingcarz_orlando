<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $fillable = [
         'first_name',
        'email',
        'phone',
        'year',
        'brand',
        'model',
        'sub_model',
        'user_id',
        'status',
        'referrer_email',
        'referrer_phone',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
        public function carYear() {
    return $this->belongsTo(CarYear::class, 'year');
}

public function brand() {
    return $this->belongsTo(Brand::class, 'brand');
}

public function model() {
    return $this->belongsTo(CarModel::class, 'model');
}

public function subModel() {
    return $this->belongsTo(SubModel::class, 'sub_model');
}

public function markAsConverted($amount = null)
{
    $this->status = 'Converted';
    $this->earning = $amount ?? rand(1000, 5000);
    $this->save();
}


}

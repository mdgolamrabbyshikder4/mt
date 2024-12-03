<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeMadeFoodSell extends Model
{
    use HasFactory;

    protected $table = 'home_made_food_sell';

    protected $fillable = [
        'user_id', 
        'food_name', 
        'food_title', 
        'food_description', 
        'food_price', 
        'food_delivery_cost', 
        'food_quantity', 
        'food_approve_type', 
        'food_location', 
        'food_image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

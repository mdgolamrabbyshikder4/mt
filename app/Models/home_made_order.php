<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class home_made_order extends Model
{
     use HasFactory;

    protected $fillable = [
        'seller_id', 'buyer_id', 'home_made_food_sell_id', 
        'total_price', 'seller_amount', 'admin_amount', 'order_status'
    ];

    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }

    public function buyer()
    {
        return $this->belongsTo(User::class, 'buyer_id');
    }

    public function foodItem()
    {
        return $this->belongsTo(HomeMadeFoodSell::class, 'home_made_food_sell_id');
    }
}

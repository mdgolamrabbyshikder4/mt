<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class our_service extends Model
{
    use HasFactory;
     protected $fillable = [
        'user_id', 'title', 'description', 'price', 'image', 'processing_time', 'cupon_code', 'demo_link', 'cupon_discount'
    ];
       public function user()
    {
        return $this->belongsTo(User::class);
    }
}

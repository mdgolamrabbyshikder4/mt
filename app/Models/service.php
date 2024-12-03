<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;
     protected $fillable = [
        'title',
        'catagory',
        'description',
        'img',
        'first_price',
        'second_price',
        'third_price',
        'first_title',
        'second_title',
        'third_title',
        'user_id',
        'rank',
        'review',
        'tag',
        'requirdfile',
        'aproval',
    ];
       public function user()
    {
        return $this->belongsTo(User::class);
    }
}

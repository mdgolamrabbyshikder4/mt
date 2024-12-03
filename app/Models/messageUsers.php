<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messageUsers extends Model
{
     protected $fillable = [
        'img',
        'img_stutas',
        'sander_user_name',
        'reciver_user_name',
        'reciver_user_img',
        'sender_img',
        'unique_id',
        'datetime',
        'sender_id',
        'reciv_id',
        'sender_seen',
        'reciv_seen',
        'discription',
    ];

    use HasFactory;
        public function user()
    {
        return $this->belongsTo(User::class);
    }
}


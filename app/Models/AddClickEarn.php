<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddClickEarn extends Model
{
    use HasFactory;
    protected $fillable = [
    'user_id', 'title', 'description', 'work_vacancy', 'work_price', 'work_img', 'work_approval', 'work_suspand', 'work_link',
];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

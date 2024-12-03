<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class deposit extends Model
{
    use HasFactory;
    protected $fillable = [
        'number',
        'amount',
        'trid',
        'methods',
        'status',
        'user_id',
        'dateandtime',
    ];
       public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FindPartner extends Model
{
    use HasFactory;
       protected $fillable = [
        'user_id',
        'name',
        'fathers_name',
        'mothers_name',
        'age',
        'profession',
        'marital_status',
        'title',
        'image',
        'description',
        'contact_number',
        'bio_data',
        'find_type',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'job_title',
        'description',
        'designation',
        'salary',
        'last_date_apply',
        'publish_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

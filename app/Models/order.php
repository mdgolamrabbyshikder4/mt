<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{

    protected $fillable = [
        'img',
        'service_id',
        'service_review',
        'discription',
        'orderprice',
        'order_date',
        'order_time',
        'ending_order_date',
        'ending_order_time',
        'frid',
        'clid',
        'adminprofit',
        'client_pay',
        'freelancer_pay',
        'order_stutas',
        'accetp_req',
        'cansel_req',
    ];
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

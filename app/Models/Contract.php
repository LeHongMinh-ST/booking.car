<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    const STATUS = [
        'no_deposit_yet' => 0,
        'deposited' => 1,
        'paid' => 2,
        'cancel' => 3
    ];

    protected $fillable = [
        'name',
        'code',
        'pick_date',
        'drop_date',
        'content',
        'paid_date',
        'price_total',
        'price_hour',
        'hour',
        'price_deposits',
        'customer_id',
        'product_order_id',
        'status'
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'product_orders';

    const STATUS = [
        'no_deposit_yet' => 0,
        'deposited' => 1,
        'contract' => 2,
        'cancel' => 3
    ];

    protected $fillable = [
        'name',
        'code',
        'pick_date',
        'drop_date',
        'price_deposits',
        'customer_id',
        'product_order_id',
        'status',
        'note'
    ];



}

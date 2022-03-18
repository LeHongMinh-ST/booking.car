<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerOrder extends Model
{
    use HasFactory;

    protected $table = 'customer_orders';

    protected $fillable = [
        'name',
        'phone',
        'person_id',
        'person_id_address',
        'person_id_date',
        'address',
        'permanent_residence',
        'customer_id'
    ];

    public function orders()
    {
        return $this->hasOne(Order::class, 'customer_order_id');
    }

}

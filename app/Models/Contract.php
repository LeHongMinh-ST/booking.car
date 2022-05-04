<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $table = 'contracts';

    const STATUS = [
        'no_deposit_yet' => 1,
        'deposited' => 2,
        'paid' => 3,
        'cancel' => 4,
        'processing' => 5
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

    public function getDateCreateTextAttribute()
    {
        $day = Carbon::make($this->created_at)->day;
        $month = Carbon::make($this->created_at)->month;
        $year = Carbon::make($this->created_at)->year;

        return "ngày $day tháng $month năm $year";
    }

    public function getPickDateTextAttribute()
    {
        $date = Carbon::createFromTimestamp($this->pick_date)->format('d/m/Y');
        $hour = Carbon::createFromTimestamp($this->pick_date)->hour;
        $minute = Carbon::createFromTimestamp($this->pick_date)->minute;
        return "$hour giờ $minute phút ngày $date";
    }

    public function getDropDateTextAttribute()
    {
        $date = Carbon::createFromTimestamp($this->drop_date)->format('d/m/Y');
        $hour = Carbon::createFromTimestamp($this->drop_date)->hour;
        $minute = Carbon::createFromTimestamp($this->pick_date)->minute;
        return "$hour giờ $minute phút ngày $date";
    }

    public function productOrder()
    {
        return $this->belongsTo(ProductOrder::class, 'product_order_id', 'id');
    }

    public function customerOrder()
    {
        return $this->belongsTo(CustomerOrder::class, 'customer_id', 'id');
    }

}

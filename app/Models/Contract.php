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
        'deposited' => 1,
        'processing' => 2,
        'cancel' => 3,
        'complete' => 4
    ];

    const IS_CMT = [
      'deactivate' => 0,
      'active'  => 1
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
        'status',
        'order_id'
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

    public function getTotalPriceTextAttribute()
    {
        return number_format($this->price_total) . " VNĐ";
    }

    public function getStatusTextAttribute()
    {
        $status = "";

        switch ($this->status) {
            case self::STATUS['deposited']:
                $status = '<span class="badge badge-info">Đã đặt cọc</span>';
                break;
            case self::STATUS['processing']:
                $status = '<span class="badge badge-primary">Đang thực hiện</span>';
                break;
            case self::STATUS['cancel']:
                $status = '<span class="badge badge-danger">Đã huỷ</span>';
                break;
            case self::STATUS['complete']:
                $status = '<span class="badge badge-success">Đã hoàn thành</span>';
                break;
        }

        return $status;
    }

    public function scopeSearch($query, $search)
    {
        if ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%')
                ->orWhere('code', 'LIKE', '%' . $search . '%');
        }
        return $query;
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

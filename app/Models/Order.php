<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    const STATUS = [
        'no_deposit_yet' => 1,
        'deposited' => 2,
        'contract' => 3,
        'cancel' => 4
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

    public function getStatusTextAttribute()
    {
        $status = '';
        switch ($this->status) {
            case 1:
                $status .= '<span class="badge badge-warning">Chưa đặt cọc</span>';
                break;
            case 2:
                $status .= '<span class="badge badge-primary">Đã đặt cọc</span>';
                break;
            case 3:
                $status .= '<span class="badge badge-success">Hợp đồng</span>';
                break;
            case 4:
                $status .= '<span class="badge badge-danger">Đã hủy</span>';
                break;
            default:
                $status .= '<span class="badge badge-warning">Chưa đặt cọc</span>';
                break;
        }
        return $status;
    }
    public function getPickDateTextAttribute()
    {
        return  Carbon::createFromTimestamp($this->pick_date)->format('H:m:s d/m/Y');
    }

    public function getDropDateTextAttribute()
    {
        return  Carbon::createFromTimestamp($this->drop_date)->format('H:m:s d/m/Y');
    }

    public function scopeFilterStatus($query, $status)
    {
        if ($status) {
            $query->where('status', $status);
        }
        return $query;
    }
    public function scopeFilterDate($query, $orderTime)
    {
        if (!empty($orderTime['start'])) {
            $start = Carbon::make($orderTime['start'])->timestamp;
            $query->where('pick_date', '>=', $start);
        }

        if (!empty($orderTime['end'])) {
            $end = Carbon::make($orderTime['end'])->timestamp;
            $query->where('drop_date', '<=', $end);
        }
        return $query;
    }


    public function scopeSearch($query, $search)
    {
        if ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('code', 'LIKE', '%' . $search . '%')
            ->orWhereHas('customerOrder', function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%');
            })
            ->orWhereHas('productOrder', function ($q) use ($search) {
                $q->where('name', 'LIKE', '%' . $search . '%');
            });
        }
        return $query;
    }


    public function productOrder()
    {
        return $this->belongsTo(ProductOrder::class, 'product_order_id', 'id');
    }

    public function customerOrder()
    {
        return $this->belongsTo(CustomerOrder::class, 'customer_order_id', 'id');
    }

}

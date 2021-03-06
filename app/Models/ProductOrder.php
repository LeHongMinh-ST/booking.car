<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $table = 'product_orders';

    const STATUS = [
        'hide' => 0,
        'normal' => 1,
        'hired' => 2
    ];

    protected $fillable = [
        'name',
        'color',
        'year',
        'license_plates',
        'price',
        'km',
        'description',
        'other_parameters',
        'status',
        'brand_id',
        'thumbnail',
        'slug',
        'product_id',
        'overtime_price',
        'over_km_price',
        'deposit_price',
        'number_of_seats',
    ];

    protected $casts = [
        'other_parameters' => 'array'
    ];

    public function getTextYearAttribute()
    {
        $year = Carbon::make($this->year)->year;
        return $year;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function contract()
    {
        return $this->hasOne(Contract::class, 'product_order_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

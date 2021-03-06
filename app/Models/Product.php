<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    const STATUS = [
        'hide' => 1,
        'normal' => 2,
        'hired' => 3,
        'deposit' => 4
    ];

    const TYPE_CAR = [
      'auto' => 1,
      'manual' => 2
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
        'link_video',
        'overtime_price',
        'over_km_price',
        'deposit_price',
        'number_of_seats',
        'type_car',
    ];

    protected $casts = [
        'other_parameters' => 'array'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_products');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function productOrders()
    {
        return $this->hasMany(ProductOrder::class)->with('contract');
    }

    public function scopeName($query, $search)
    {
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')->
            orWhere('license_plates', 'like', '%' . $search . '%');
        }

        return $query;
    }

    public function scopeStatus($query, $status)
    {
        if ($status) {
            $query->where('status', $status);
        }

        return $query;
    }

    public function scopeFilterBrand($query, $brandId)
    {
        if ($brandId) {
            $query->whereHas('brand', function ($q) use ($brandId) {
                $q->where('id', $brandId);
            });
        }
    }

    public function scopeFilterColor($query, $color)
    {
        if ($color) {
            $query->where('color', 'like', "%$color%");
        }

        return $query;
    }

    public function scopeFilterTypeCar($query, $typeCar)
    {
        if ($typeCar) {
            $query->where('type_car', $typeCar);
        }

        return $query;
    }

    public function scopeFilterNumber($query, $number)
    {
        if ($number) {
            $query->where('number_of_seats', $number);
        }

        return $query;
    }

    public function scopeFilterCategory($query, $categoryIds)
    {
        if ($categoryIds) {
            $query->whereHas('categories', function ($q) use ($categoryIds) {
                $q->whereIn('categories.id', $categoryIds);
            });
        }

        return $query;
    }

    public function scopeFilterOrderBy($query, $orderBy)
    {
        if ($orderBy == 'priceDesc') {
            $query->orderBy('price', 'desc');
        }

        if ($orderBy == 'priceAsc') {
            $query->orderBy('price', 'asc');
        }

        return $query;
    }

}

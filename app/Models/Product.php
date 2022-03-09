<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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
        'slug'
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
            $query->where('name', $status);
        }

        return $query;
    }

    public function scopeFilterBrand($query, $brandId)
    {
        if ($brandId) {
            $query->whereHas('brands', function ($q) use ($brandId) {
                $q->where('id', $brandId);
            });
        }

        return $query;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    const IS_ACTIVE = [
        'deactivate' => 0,
        'active' => 1
    ];

    protected $fillable = [
        'name',
        'description',
        'parent_id',
        'depth',
        'is_active'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'category_products');
    }

    protected $appends = [
        'parent'
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function scopeName($query, $search)
    {
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        return $query;
    }
}

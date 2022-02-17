<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    const IS_ACTIVE = [
        'deactivate' => 0,
        'active' => 1
    ];

    protected $fillable = [
        'name',
        'thumbnail',
        'description',
        'is_active'
    ];

    public function scopeSearch($query, $search)
    {
        if ($search) {
            $query->where('name', 'like', '%' . $search . '%');
        }
        return $query;
    }
}

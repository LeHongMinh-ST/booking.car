<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBlog extends Model
{
    use HasFactory;

    protected $table = 'category_blogs';

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

    public function post()
    {
        return $this->belongsToMany(Post::class, 'category_blog_posts', 'post_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryBlog extends Model
{
    use HasFactory;

    protected $table = 'category_blogs';

    protected $fillable = [
        'name',
        'slug',
        'parent_id'
    ];

    public function post()
    {
        return $this->belongsToMany(Post::class, 'category_blog_posts', 'post_id');
    }
}

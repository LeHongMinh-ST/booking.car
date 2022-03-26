<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    const STATUS = [
      'publish' => 1,
      'hide' => 2
    ];

    protected $fillable = [
        'title',
        'slug',
        'content',
        'description',
        'user_id',
        'status',
        'thumbnail'
    ];

    public function categories()
    {
        return $this->belongsToMany(CategoryBlog::class, 'category_blog_posts', 'category_blog_id', 'post_id');
    }

    public function user() {
        return $this->belongsTo(Admin::class, 'user_id');
    }

    public function scopeName($query, $search)
    {
        if ($search) {
            $query->where('title', 'like', '%' . $search . '%');
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

    public function getStatusTextAttribute()
    {
        $status = '';
        switch ((int)$this->status) {
            case 1:
                $status .= '<span class="badge badge-success">Công khai</span>';
                break;
            case 2:
                $status .= '<span class="badge badge-danger">Ẩn</span>';
                break;
            default:
                $status .= '<span class="badge badge-success">Công khai</span>';
                break;
        }
        return $status;
    }


    public function scopeFilterCategory($query, $categoryIds)
    {
        if ($categoryIds) {
            $query->whereHas('categories', function ($q) use ($categoryIds) {
                $q->whereIn('category_blogs.id', $categoryIds);
            });
        }

        return $query;
    }
}

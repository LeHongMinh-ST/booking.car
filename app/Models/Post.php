<?php

namespace App\Models;

use App\Http\Livewire\Client\CategoryPost;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'description',
        'thumbnail'
    ];

    public function categories()
    {
        return $this->belongsToMany(CategoryPost::class, 'category_blog_posts', 'category_blog_id', 'id');
    }
}

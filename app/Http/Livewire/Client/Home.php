<?php

namespace App\Http\Livewire\Client;

use App\Models\Category;
use App\Models\Post;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $categories = Category::query()->where('is_active', Category::IS_ACTIVE['active'])->get();
        $posts = Post::query()->with(['categories', 'user'])->limit(3)->get();
        return view('livewire.client.home', [
            'categories' => $categories,
            'posts' => $posts
        ])->extends('client.layouts.master')->section('content');
    }
}

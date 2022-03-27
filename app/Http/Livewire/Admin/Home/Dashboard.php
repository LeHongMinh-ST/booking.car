<?php

namespace App\Http\Livewire\Admin\Home;

use App\Models\Post;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $posts = Post::query()->with(['categories', 'users'])->limit(3)->get();
        return view('livewire.admin.home.dashboard', [
            'posts' => $posts
        ])
            ->extends('admin.layouts.master')->section('content');
    }
}

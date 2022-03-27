<?php

namespace App\Http\Livewire\Client;

use App\Models\Post;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $posts = Post::query()->with(['categories', 'user'])->limit(3)->get();
        return view('livewire.client.home', [
            'posts' => $posts
        ])->extends('client.layouts.master')->section('content');
    }
}

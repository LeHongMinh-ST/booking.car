<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\Post as PostModel;

class Post extends Component
{
    public $post;

    public function render()
    {
        return view('livewire.client.post', [
            'post' => $this->post
        ])
            ->extends('client.layouts.master')->section('content');
    }

    public function mount($slug)
    {
        $this->post = PostModel::query()->where('slug', $slug)->first();
    }
}

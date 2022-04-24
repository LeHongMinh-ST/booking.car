<?php

namespace App\Http\Livewire\Client;

use App\Models\Post as PostModel;
use Livewire\Component;
use Livewire\WithPagination;

class Blog extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $posts = PostModel::query()->where('status', PostModel::STATUS['publish'])->paginate(12);
        return view('livewire.client.blog', [
            'posts' => $posts
        ])
            ->extends('client.layouts.master')->section('content');
    }
}

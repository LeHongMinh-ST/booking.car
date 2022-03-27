<?php

namespace App\Http\Livewire\Admin\Home;

use App\Models\Post;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admin.home.dashboard', [
        ])
            ->extends('admin.layouts.master')->section('content');
    }
}

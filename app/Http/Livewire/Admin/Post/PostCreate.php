<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Category;
use App\Models\CategoryBlog;
use Livewire\Component;

class PostCreate extends Component
{
    public $title;
    public $description;
    public $content;
    public $status;
    public $thumbnail;
    public $categoryChecked = [];

    protected $listeners = [
        'changeImage' => 'updateThumbnail',
        'updateDescription' => 'updateDescription',
        'changeContent' => 'updateContent',
        'changeImages' => 'updateImages'
    ];

    public function render()
    {
        $categories = CategoryBlog::where(['is_active' => CategoryBlog::IS_ACTIVE['active'], 'depth' => 0])
            ->with('children')->get();
        return view('livewire.admin.post.post-create', [
            'categories' => $categories
        ])->extends('admin.layouts.master')->section('content');
    }

    protected $rules = [
        'title' => 'required|string|max:255',
        'content' => 'required',
    ];

    protected $validationAttributes  = [
        'title' => 'Tiêu đề',
        'content' => 'Nội dung',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updateThumbnail($value)
    {
        $this->thumbnail = $value;
    }

    public function updateDescription($value)
    {
        $this->description = $value;
    }
    public function updateContent($value)
    {
        $this->content = $value;
    }

    public function clearImagePreview()
    {
        $this->thumbnail = '';
    }
}


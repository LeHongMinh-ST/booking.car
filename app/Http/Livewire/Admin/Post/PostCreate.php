<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\Post;
use App\Models\CategoryBlog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;

class PostCreate extends Component
{
    public $title;
    public $description;
    public $content;
    public $status = Post::STATUS['publish'];
    public $thumbnail;
    public $categoryChecked = [];

    protected $listeners = [
        'changeImage' => 'updateThumbnail',
        'changeContent' => 'updateContent',
        'changeImages' => 'updateImages',
        'changeStatus' => 'updateStatus'
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

    public function updateStatus($value)
    {
        $this->status = $value;
    }

    public function updateContent($value)
    {
        $this->content = $value;
        if ($value) {
            $this->resetValidation('content');
        }
    }

    public function clearImagePreview()
    {
        $this->thumbnail = '';
    }

    public function store()
    {
        if (!checkPermission('post-create')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
            return;
        }

        $this->validate();

        try {
            $post = Post::create([
                'title' => $this->title,
                'description' => $this->description,
                'content' => $this->content,
                'thumbnail' => $this->thumbnail,
                'user_id' => auth('admin')->user()->id,
                'status' => $this->status,
                'slug' => Str::slug($this->title . Carbon::now()->timestamp)
            ]);

            if ($post) {
                $post->categories()->attach($this->categoryChecked);
            }

            session()->flash('success', 'Tạo mới thành công');

            return redirect()->route('admin.post');
        }catch (\Exception $e) {
            Log::error('Error create post', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Tạo mới thất bại!']);
        }
    }
}


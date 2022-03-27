<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\CategoryBlog;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;

class PostUpdate extends Component
{
    public $title;
    public $description;
    public $content;
    public $status = Post::STATUS['publish'];
    public $thumbnail;
    public $categoryChecked = [];
    public $postId;
    public $userId;

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
        return view('livewire.admin.post.post-update', [
            'categories' => $categories
        ])->extends('admin.layouts.master')->section('content');
    }

    public function mount($id) {
        $post = Post::query()->with(['categories'])->find($id);

        if($post) {
            $this->postId = $post->id;
            $this->title = $post->title;
            $this->description = $post->description;
            $this->thumbnail = $post->thumbnail;
            $this->content = $post->content;
            $this->status = $post->status;
            $this->userId = $post->user_id;
            $this->categoryChecked = $post->categories->pluck('id')->toArray();

            if ($this->userId != auth('admin')->user()->id) {
                abort(403);
            }
        }
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

    public function update()
    {
        if (!checkPermission('post-update')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
            return false;
        }

        if ($this->userId != auth('admin')->user()->id) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
            return false;
        }

        $this->validate();

        try {
            $post = Post::query()->with(['categories'])->find($this->postId);
            if ($post) {
                $post->update([
                    'title' => $this->title,
                    'description' => $this->description,
                    'content' => $this->content,
                    'thumbnail' => $this->thumbnail,
                    'status' => $this->status,
                    'slug' => Str::slug($this->title . Carbon::now()->timestamp)
                ]);
                $post->categories()->detach();
                $post->categories()->attach($this->categoryChecked);
            }

            session()->flash('success', 'Cập nhật thành công');

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

<?php

namespace App\Http\Livewire\Admin\Post;

use App\Models\CategoryBlog;
use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class PostIndex extends Component
{
    public $perPage = 10;
    public $deleteId;
    public $status = "";
    public $search = '';
    public $categoryIds = [];
    protected $listeners = [
        'changeFilterCategories' => 'updateCategoryIds',
        'changeFilterStatus' => 'updateStatus',
    ];


    public function render()
    {
        $posts = Post::query()
            ->name($this->search)
            ->filterCategory($this->categoryIds)
            ->status($this->status)
            ->with(['categories'])->paginate($this->perPage);
        $categories = CategoryBlog::query()->where('is_active', CategoryBlog::IS_ACTIVE['active'])->get();

        return view('livewire.admin.post.post-index',[
            'posts' => $posts,
            'categories' => $categories
        ])->extends('admin.layouts.master')->section('content');
    }


    public function mount()
    {

    }

    public function updateCategoryIds($value)
    {
        $this->categoryIds = $value;
    }

    public function updateStatus($value)
    {
        $this->status = $value;
    }

    public function resetFilter()
    {
        $this->status = '';
        $this->categoryIds = '';

        $this->dispatchBrowserEvent('clearFilter');
    }

    public function destroy()
    {
        if (!checkPermission('post-delete')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!!', 'title' => '403']);
            return false;
        }

        try {
            $post = Post::query()->where('id', $this->deleteId)->first();

            if ($post->user_id != auth('admin')->user()->id) {
                $this->dispatchBrowserEvent('alert',
                    ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
                return false;
            }

            $post->categories()->detach();
            Post::destroy($this->deleteId);
            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Xóa thành công!']);

            $this->closeModal();
        } catch (\Exception $e) {
            Log::error('Error delete post', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Xóa thất bại!']);
        }
    }


    public function openDeleteModal($id)
    {
        $this->deleteId = $id;
        $this->dispatchBrowserEvent('openDeleteModal');
    }

    public function closeModal()
    {
        $this->deleteId = null;
        $this->dispatchBrowserEvent('closeModal');
    }
}

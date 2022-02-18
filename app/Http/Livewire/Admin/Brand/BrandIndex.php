<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Brand;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BrandIndex extends Component
{
    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $showCreateModal = false;
    public $image = '';
    public $name = '';
    public $description = '';
    public $perPage = 10;
    public $search = '';

    public function render()
    {
        return view('livewire.admin.brand.brand-index', [
            'brands' => Brand::query()->search($this->search)->orderBy('created_at', 'desc')->paginate($this->perPage)
        ])->extends('admin.layouts.master')->section('content');
    }

    public function mount()
    {

    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'image' => 'image|nullable',
            'name' => 'required|string'
        ]);
    }

    public function showCreateModal()
    {
        $this->showCreateModal = true;
    }

    public function closeCreateModal()
    {
        $this->clearForm();
        $this->showCreateModal = false;
    }

    public function clearImagePreview()
    {
        $this->image = '';
    }


    public function store()
    {

        $this->validate([
            'image' => 'image|nullable',
            'name' => 'required|string'
        ]);

        try {
            $image = '';

            if ($this->image) {
                $image = '/storage/'. $this->image->store('brands', 'public');
            }

            Brand::create([
                'name' => $this->name,
                'description' => $this->description,
                'thumbnail' => $image
            ]);

            $this->closeCreateModal();

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Tạo mới thành công!']);

        } catch (\Exception $e) {
            Log::error('Error create brand', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Tạo mới thất bại!']);
        }

    }

    public function clearForm()
    {
        $this->name = '';
        $this->description = '';
        $this->image = '';
    }

}

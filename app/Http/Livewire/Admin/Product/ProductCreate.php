<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductCreate extends Component
{
    use WithFileUploads;

    public $name;
    public $description;
    public $color;
    public $price;
    public $year;
    public $licensePlates;
    public $km;
    public $brandId;
    public $thumbnail;
    public $otherParameters = [];
    public $categoryChecked = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'color' => 'required|string|max:255',
        'licensePlates' => 'required|string|max:255',
        'km' => 'required|string|max:255',
        'year' => 'required|date|date_format:d-m-Y',
        'price' => 'required|integer|min:0',
        'thumbnail' => 'image|nullable',
    ];

    protected $validationAttributes  = [
        'licensePlates' => 'Biển kiểm soát',
        'name' => 'Tên xe',
        'price' => 'Giá thuê',
        'km' => 'Km',
        'year' => 'Ngày đăng kí',
        'thumbnail' => 'Ảnh đại diện',
        'color' => 'Màu sắc',
    ];

    public function render()
    {
        $brands = Brand::where('is_active', Brand::IS_ACTIVE['active'])->get();
        $categories = Category::where(['is_active' => Brand::IS_ACTIVE['active'], 'depth' => 0])
            ->with('children')->get();

        return view('livewire.admin.product.product-create', [
            'brands'=> $brands,
            'categories' => $categories
        ])->extends('admin.layouts.master')->section('content');
    }

    public function mount()
    {

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {
        if (!checkPermission('product-create')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
        }

        $this->validate();

        try {

            $image = '';

            if ($this->thumbnail) {
                $image = '/storage/'. $this->thumbnail->store('product', 'public');
            }

            $product = Product::create([
                'name' => $this->name,
                'color' => $this->color,
                'km' => $this->km,
                'year' => $this->year,
                'price' => $this->price,
                'thumbnail' => $image,
                'other_parameters' => $this->otherParameters,
                'license_plates' => $this->licensePlates,
                'brand_id' => $this->brandId,
                'slug' => Str::slug($this->name . $this->licensePlates)
            ]);

            $product->categories()->attach($this->categoryChecked);

            session()->flash('success', 'Tạo mới thành công');

            return redirect()->route('admin.product');
        }catch (\Exception $e) {
            Log::error('Error create product', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Tạo mới thất bại!']);
        }
    }

    public function clearImagePreview()
    {
        $this->thumbnail = '';
    }

    public function addOtherParameter()
    {
        $this->otherParameters[] = [
          'key' => '',
          'value' => ''
        ];
    }

    public function deleteOtherParameter($index)
    {
        array_splice($this->otherParameters, $index, 1);
    }
}

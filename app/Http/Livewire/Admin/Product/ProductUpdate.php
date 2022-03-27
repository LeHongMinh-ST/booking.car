<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductUpdate extends Component
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
    public $status;
    public $categoryChecked = [];
    public $productId;
    public $imageUpdate;

    public $images = [];

    protected $listeners = [
        'changeImage' => 'updateThumbnail',
        'updateDescription' => 'updateDescription',
        'changeImages' => 'updateImages'
    ];
    protected $rules = [
        'name' => 'required|string|max:255',
        'color' => 'required|string|max:255',
        'licensePlates' => 'required|string|max:255',
        'km' => 'required|string|max:255',
        'year' => 'required|date|date_format:d-m-Y',
        'price' => 'required|integer|min:0',
    ];

    protected $validationAttributes = [
        'licensePlates' => 'Biển kiểm soát',
        'name' => 'Tên xe',
        'price' => 'Giá thuê',
        'km' => 'Km',
        'year' => 'Ngày đăng ký',
        'color' => 'Màu sắc',
    ];

    public function render()
    {
        $brands = Brand::where('is_active', Brand::IS_ACTIVE['active'])->get();
        $categories = Category::where(['is_active' => Brand::IS_ACTIVE['active'], 'depth' => 0])
            ->with('children')->get();

        return view('livewire.admin.product.product-update', [
            'brands' => $brands,
            'categories' => $categories
        ])->extends('admin.layouts.master')->section('content');
    }

    public function mount($id)
    {
        $product = Product::query()->with(['categories', 'brand'])->find($id);
        if ($product) {
            $this->name = $product->name;
            $this->color = $product->color;
            $this->year = $product->year;
            $this->licensePlates = $product->license_plates;
            $this->price = $product->price;
            $this->km = $product->km;
            $this->brandId = $product->brand_id;
            $this->imageUpdate = $product->thumbnail;
            $this->otherParameters = $product->other_parameters;
            $this->status = $product->status;
            $this->productId  = $product->id;
            $this->categoryChecked = $product->categories()->pluck('id')->toArray();
            foreach ($product->images as $image) {
                $this->images[] = $image->image_url;
            }
        }
    }

    public function updateImages($value)
    {
        $this->images = array_merge(explode(',', $value),  $this->images) ;
    }

    public function deleteAllImage()
    {
        $this->images = [];
    }


    public function deleteImage($key)
    {
        array_splice($this->images, $key, 1);
    }

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

    public function update()
    {
        if (!checkPermission('product-create')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
            return false;
        }

        $this->validate();

        DB::beginTransaction();
        try {

            $image = $this->imageUpdate;

            if ($this->thumbnail) {
                $image = $this->thumbnail;
            }

            $product = Product::query()->where('id', $this->productId)->first();
            $product->update([
                'name' => $this->name,
                'color' => $this->color,
                'km' => $this->km,
                'year' => $this->year,
                'price' => $this->price,
                'thumbnail' => $image,
                'other_parameters' => $this->otherParameters,
                'license_plates' => $this->licensePlates,
                'brand_id' => $this->brandId,
                'status' => $this->status,
                'slug' => Str::slug($this->name . $this->licensePlates)
            ]);
            if ($product) {
                $product->categories()->detach();

                $product->categories()->attach($this->categoryChecked);

                $idImages = $product->images()->get()->pluck('id');

                $product->images()->whereIn('id', $idImages)->delete();

                foreach ($this->images as $image) {
                    $product->images()->create([
                        'image_url' => $image
                    ]);
                }
            }


            session()->flash('success', 'Cập nhật thành công');

            DB::commit();
            return redirect()->route('admin.product');
        } catch (\Exception $e) {

            DB::rollBack();
            Log::error('Error update product', [
                'method' => __METHOD__,
                'message' => $e->getMessage()
            ]);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Tạo mới thất bại!']);
        }
    }
}

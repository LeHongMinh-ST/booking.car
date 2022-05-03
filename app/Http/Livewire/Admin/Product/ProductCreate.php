<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Livewire\Component;

class ProductCreate extends Component
{
    public $name;
    public $description;
    public $color;
    public $price;
    public $overtimePrice;
    public $overKmPrice;
    public $numberSeats;
    public $depositPrice;
    public $year;
    public $licensePlates;
    public $km;
    public $brandId;
    public $linkVideo;
    public $thumbnail;
    public $otherParameters = [];
    public $categoryChecked = [];
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
        'linkVideo' => 'nullable|url',
        'overtimePrice' => 'required|integer|min:0',
//        'overKmPrice' => 'required|integer|min:0',
        'depositPrice' => 'required|integer|min:0',
        'numberSeats' => 'required|integer|min:0',
    ];

    protected $validationAttributes = [
        'licensePlates' => 'Biển kiểm soát',
        'name' => 'Tên xe',
        'price' => 'Giá thuê',
        'km' => 'Km',
        'year' => 'Ngày đăng ký',
        'color' => 'Màu sắc',
        'linkVideo' => 'Đường dẫn video',
        'overtimePrice' => 'Tiền phụ trội giờ',
//        'overKmPrice' => 'Tiền phụ trội km',
        'depositPrice' => 'Tiền đặt cọc tối  thiểu',
        'numberSeats' => 'Số chỗ',
    ];

    public function render()
    {
        $brands = Brand::where('is_active', Brand::IS_ACTIVE['active'])->get();
        $categories = Category::where(['is_active' => Category::IS_ACTIVE['active'], 'depth' => 0])
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

    public function updateThumbnail($value)
    {
        $this->thumbnail = $value;
    }

    public function updateDescription($value)
    {
        $this->description = $value;
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

    public function store()
    {
        if (!checkPermission('product-create')) {
            $this->dispatchBrowserEvent('alert',
                ['type' => 'error', 'message' => 'Bạn không có quyền thực hiện chức năng này!', 'title' => '403']);
            return false;
        }

        $this->validate();

        try {
            $product = Product::create([
                'name' => $this->name,
                'color' => $this->color,
                'km' => $this->km,
                'year' => $this->year,
                'price' => $this->price,
                'thumbnail' => $this->thumbnail,
                'other_parameters' => $this->otherParameters,
                'license_plates' => $this->licensePlates,
                'description' => $this->description,
                'brand_id' => $this->brandId,
                'link_video' => $this->linkVideo,
                'overtime_price' => $this->overtimePrice,
                'over_km_price' => $this->overKmPrice,
                'deposit_price' => $this->depositPrice,
                'number_of_seats' => $this->numberSeats,
                'slug' => Str::slug($this->name . $this->licensePlates)
            ]);

            if ($product) {
                $product->categories()->attach($this->categoryChecked);
                foreach ($this->images as $image) {
                    $product->images()->create([
                        'image_url' => $image
                    ]);
                }
            }

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

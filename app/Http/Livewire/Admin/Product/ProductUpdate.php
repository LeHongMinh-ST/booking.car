<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use Livewire\WithFileUploads;

class ProductUpdate extends Component
{
    use WithFileUploads;

    public function render()
    {
        return view('livewire.admin.product.product-update');
    }
}

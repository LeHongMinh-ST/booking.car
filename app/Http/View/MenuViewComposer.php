<?php

namespace App\Http\View;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\View\View;

class MenuViewComposer
{
    public $categories = [];
    public $brands = [];

    public function __construct()
    {
        $this->categories = Category::query()
            ->where([
                'is_active' => Category::IS_ACTIVE['active'],
            ])
            ->with(['children'])->get();
        $this->brands = Brand::query()
            ->where('is_active', Brand::IS_ACTIVE['active'])
            ->get();

    }

    public function compose(View $view)
    {
        $view->with('menuCategories', $this->categories);
        $view->with('menuBrands', $this->brands);
    }
}

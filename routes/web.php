<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Livewire\Admin\Account\AccountCreate;
use App\Http\Livewire\Admin\Account\AccountIndex;
use App\Http\Livewire\Admin\Account\AccountUpdate;
use App\Http\Livewire\Admin\Brand\BrandIndex;
use App\Http\Livewire\Admin\Category\CategoryIndex;
use App\Http\Livewire\Admin\Customer\CustomerCreate;
use App\Http\Livewire\Admin\Customer\CustomerIndex;
use App\Http\Livewire\Admin\Customer\CustomerUpdate;
use App\Http\Livewire\Admin\Home\Dashboard;
use App\Http\Livewire\Admin\Order\OrderIndex;
use App\Http\Livewire\Admin\Product\ProductCreate;
use App\Http\Livewire\Admin\Product\ProductDetail;
use App\Http\Livewire\Admin\Product\ProductIndex;
use App\Http\Livewire\Admin\Product\ProductUpdate;
use App\Http\Livewire\Admin\Role\RoleCreate;
use App\Http\Livewire\Admin\Role\RoleIndex;
use App\Http\Livewire\Admin\Role\RoleUpdate;
use App\Http\Livewire\Client\About;
use App\Http\Livewire\Client\Blog;
use App\Http\Livewire\Client\CategoryPost;
use App\Http\Livewire\Client\Contact;
use App\Http\Livewire\Client\Home;
use App\Http\Livewire\Client\ListProduct;
use App\Http\Livewire\Client\ListProductByBrand;
use App\Http\Livewire\Client\ListProductByCategory;
use App\Http\Livewire\Client\Post;
use App\Http\Livewire\Client\Product;
use App\Http\Livewire\Client\Service;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['middleware' => ['admin.auth']], function () {
        Route::get('/',function () {
            return redirect()->route('admin.dashboard');
        })->name('index');
        Route::get('/dashboard',Dashboard::class)->name('dashboard');
        Route::get('/role',RoleIndex::class)->name('role');
        Route::get('/brand',BrandIndex::class)->name('brand');
        Route::get('/category',CategoryIndex::class)->name('category-product');
        Route::get('/contract',CategoryIndex::class)->name('contract');
        Route::get('/category-post',CategoryIndex::class)->name('category-post');
        Route::get('/post',CategoryIndex::class)->name('post');
        Route::get('/order',OrderIndex::class)->name('order');
        Route::get('/contact',OrderIndex::class)->name('contact');
        Route::get('/statistic/revenue',CategoryIndex::class)->name('statistic.revenue');
        Route::get('/statistic/product',CategoryIndex::class)->name('statistic.product');

        Route::prefix('product')->group(function () {
            Route::get('/',ProductIndex::class)->middleware('permission:product-index')->name('product');
            Route::get('/create',ProductCreate::class)->middleware('permission:product-create')->name('product.create');
            Route::get('/{id}',ProductDetail::class)->middleware('permission:product-index')->name('product.detail');
            Route::get('/{id}/edit',ProductUpdate::class)->middleware('permission:product-update')->name('product.edit');
        });

        Route::prefix('customer')->group(function () {
            Route::get('/',CustomerIndex::class)->middleware('permission:customer-index')->name('customer');
            Route::get('/create',CustomerCreate::class)->middleware('permission:customer-create')->name('customer.create');
            Route::get('/{id}/edit',CustomerUpdate::class)->middleware('permission:customer-update')->name('customer.edit');
        });

        Route::prefix('account')->group(function () {
            Route::get('/',AccountIndex::class)->middleware('permission:account-index')->name('account');
            Route::get('/create', AccountCreate::class)->middleware('permission:account-create')->name('account.create');
            Route::get('/{id}/edit', AccountUpdate::class)->middleware('permission:account-update')->name('account.edit');
        });

        Route::prefix('role')->group(function () {
            Route::get('/', RoleIndex::class)->middleware('permission:role-index')->name('role');
            Route::get('/create', RoleCreate::class)->middleware('permission:role-create')->name('role.create');
            Route::get('/{id}/edit', RoleUpdate::class)->middleware('permission:role-update')->name('role.edit');
        });


    });
});
Route::group(['prefix' => 'laravel-filemanager'], function () {
    Lfm::routes();
});

Route::get('/home', function () {
    return redirect()->route('home');
});
Route::get('/', Home::class)->name('home');
//Route::get('/login', Home::class)->name('login');
Route::get('/products', ListProduct::class)->name('products');
Route::get('/product/{slug}', Product::class)->name('product');
Route::get('/category/{slug}', ListProductByCategory::class)->name('product-by-category');
Route::get('/brand/{slug}', ListProductByBrand::class)->name('product-by-brand');
Route::get('/category-post/{slug}', CategoryPost::class)->name('category.post');
Route::get('/posts', Blog::class)->name('blog');
Route::get('/post/{slug}', Post::class)->name('post');
Route::get('/about', About::class)->name('about');
Route::get('/service', Service::class)->name('service');
Route::get('/contact', Contact::class)->name('contact');


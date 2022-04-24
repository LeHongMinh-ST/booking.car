<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Livewire\Admin\Account\AccountCreate;
use App\Http\Livewire\Admin\Account\AccountIndex;
use App\Http\Livewire\Admin\Account\AccountUpdate;
use App\Http\Livewire\Admin\Brand\BrandIndex;
use App\Http\Livewire\Admin\Category\CategoryIndex;
use App\Http\Livewire\Admin\CategoryPost\CategoryPostIndex;
use App\Http\Livewire\Admin\Customer\CustomerCreate;
use App\Http\Livewire\Admin\Customer\CustomerIndex;
use App\Http\Livewire\Admin\Customer\CustomerUpdate;
use App\Http\Livewire\Admin\Home\Dashboard;
use App\Http\Livewire\Admin\Order\OrderIndex;
use App\Http\Livewire\Admin\Order\OrderCreate;
use App\Http\Livewire\Admin\Order\OrderUpdate;
use App\Http\Livewire\Admin\Order\OrderDetail;
use App\Http\Livewire\Admin\Product\ProductCreate;
use App\Http\Livewire\Admin\Product\ProductDetail;
use App\Http\Livewire\Admin\Product\ProductIndex;
use App\Http\Livewire\Admin\Product\ProductUpdate;
use App\Http\Livewire\Admin\Role\RoleCreate;
use App\Http\Livewire\Admin\Role\RoleIndex;
use App\Http\Livewire\Admin\Role\RoleUpdate;
use App\Http\Livewire\Admin\Post\PostIndex;
use App\Http\Livewire\Admin\Post\PostCreate;
use App\Http\Livewire\Admin\Post\PostUpdate;
use App\Http\Livewire\Client\Home;
use App\Http\Livewire\Client\About;
use App\Http\Livewire\Client\Service;
use App\Http\Livewire\Client\Contact;
use App\Http\Livewire\Client\Product;
use App\Http\Livewire\Client\ListProduct;
use App\Http\Livewire\Client\ListProductByBrand;
use App\Http\Livewire\Client\ListProductByCategory;
use App\Http\Livewire\Client\Blog;
use App\Http\Livewire\Client\Post;
use App\Http\Livewire\Client\CategoryPost;
use App\Models\CategoryBlog;
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
        Route::get('/dashboard',Dashboard::class)->name('dashboard');
        Route::get('/role',RoleIndex::class)->name('role');
        Route::get('/brand',BrandIndex::class)->name('brand');
        Route::get('/category',CategoryIndex::class)->name('category');
        Route::get('/category-post',CategoryPostIndex::class)->name('category-post');
        Route::get('/statistic/revenue',CategoryIndex::class)->name('statistic.revenue');
        Route::get('/statistic/product',CategoryIndex::class)->name('statistic.product');

        Route::prefix('product')->group(function () {
            Route::get('/',ProductIndex::class)->middleware('permission:product-index')->name('product');
            Route::get('/create',ProductCreate::class)->middleware('permission:product-create')->name('product.create');
            Route::get('/{id}',ProductDetail::class)->middleware('permission:product-index')->name('product.detail');
            Route::get('/{id}/edit',ProductUpdate::class)->middleware('permission:product-update')->name('product.edit');
        });

        Route::prefix('post')->group(function () {
            Route::get('/',PostIndex::class)->middleware('permission:post-index')->name('post');
            Route::get('/create',PostCreate::class)->middleware('permission:post-create')->name('post.create');
            Route::get('/{id}/edit',PostUpdate::class)->middleware('permission:post-update')->name('post.edit');
        });

        Route::prefix('customer')->group(function () {
            Route::get('/',CustomerIndex::class)->middleware('permission:customer-index')->name('customer');
            Route::get('/create',CustomerCreate::class)->middleware('permission:customer-create')->name('customer.create');
            Route::get('/{id}/edit',CustomerUpdate::class)->middleware('permission:customer-update')->name('customer.edit');
        });

        Route::prefix('account')->group(function () {
            Route::get('/',AccountIndex::class)->middleware('permission:account-index')->name('account');
            Route::get('/create',AccountCreate::class)->middleware('permission:account-create')->name('account.create');
            Route::get('/{id}/edit',AccountUpdate::class)->middleware('permission:account-update')->name('account.edit');
        });

        Route::prefix('role')->group(function () {
            Route::get('/',RoleIndex::class)->middleware('permission:role-index')->name('role');
            Route::get('/create',RoleCreate::class)->middleware('permission:role-create')->name('role.create');
            Route::get('/{id}/edit',RoleUpdate::class)->middleware('permission:role-update')->name('role.edit');
        });

        Route::prefix('order')->group(function () {
            Route::get('/',OrderIndex::class)->middleware('permission:order-index')->name('order');
            Route::get('/create',OrderCreate::class)->middleware('permission:order-create')->name('order.create');
            Route::get('/{id}/edit',OrderUpdate::class)->middleware('permission:order-update')->name('order.edit');
        });

    });
});

Route::group(['prefix' => 'filemanager', 'middleware' => ['admin.auth']], function () {
    Lfm::routes();
});

Route::get('/home', function () {
    return redirect()->route('home');
});
Route::get('/', Home::class)->name('home');
Route::get('/san-pham', ListProduct::class)->name('products');
Route::get('/san-pham/{slug}', Product::class)->name('product');
Route::get('/danh-muc/{slug}', ListProductByCategory::class)->name('product-by-category');
Route::get('/nhan-hieu/{slug}', ListProductByBrand::class)->name('product-by-brand');
Route::get('/danh-muc-bai-viet/{slug}', CategoryPost::class)->name('category.post');
Route::get('/bai-viet', Blog::class)->name('blog');
Route::get('/bai-viet/{slug}', Post::class)->name('post');
Route::get('/gioi-thieu', About::class)->name('about');
Route::get('/dich-vu', Service::class)->name('service');
Route::get('/lien-he', Contact::class)->name('contact');


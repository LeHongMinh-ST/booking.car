<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Livewire\Admin\Home\Dashboard;
use App\Http\Livewire\Admin\Account\AccountIndex;
use App\Http\Livewire\Admin\Account\AccountCreate;
use App\Http\Livewire\Admin\Account\AccountUpdate;
use App\Http\Livewire\Admin\Role\RoleIndex;
use App\Http\Livewire\Admin\Role\RoleCreate;
use App\Http\Livewire\Admin\Role\RoleUpdate;
use App\Http\Livewire\Admin\Product\ProductIndex;
use App\Http\Livewire\Admin\Product\ProductDetail;
use App\Http\Livewire\Admin\Product\ProductCreate;
use App\Http\Livewire\Admin\Product\ProductUpdate;
use App\Http\Livewire\Admin\Brand\BrandIndex;
use App\Http\Livewire\Admin\Category\CategoryIndex;
use App\Http\Livewire\Admin\Customer\CustomerIndex;
use App\Http\Livewire\Admin\Customer\CustomerCreate;
use App\Http\Livewire\Admin\Customer\CustomerUpdate;
use App\Http\Livewire\Admin\Order\OrderIndex;
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
        Route::get('/category-post',CategoryIndex::class)->name('category-post');
        Route::get('/post',CategoryIndex::class)->name('post');
        Route::get('/order',OrderIndex::class)->name('order');
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
            Route::get('/create',AccountCreate::class)->middleware('permission:account-create')->name('account.create');
            Route::get('/{id}/edit',AccountUpdate::class)->middleware('permission:account-update')->name('account.edit');
        });

        Route::prefix('role')->group(function () {
            Route::get('/',RoleIndex::class)->middleware('permission:role-index')->name('role');
            Route::get('/create',RoleCreate::class)->middleware('permission:role-create')->name('role.create');
            Route::get('/{id}/edit',RoleUpdate::class)->middleware('permission:role-update')->name('role.edit');
        });

    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['admin.auth']], function () {
   Lfm::routes();
});


Route::get('/', function () {
    return view('welcome');
});

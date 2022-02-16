<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Livewire\Admin\Home\Dashboard;
use App\Http\Livewire\Admin\Account\AccountIndex;
use App\Http\Livewire\Admin\Role\RoleIndex;
use App\Http\Livewire\Admin\Product\ProductIndex;
use App\Http\Livewire\Admin\Product\ProductCreate;
use App\Http\Livewire\Admin\Brand\BrandIndex;
use App\Http\Livewire\Admin\Category\CategoryIndex;

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
        Route::get('/account',AccountIndex::class)->name('account');
        Route::get('/role',RoleIndex::class)->name('role');
        Route::get('/brand',BrandIndex::class)->name('brand');
        Route::get('/category',CategoryIndex::class)->name('category');

        Route::prefix('product')->group(function () {
            Route::get('/',ProductIndex::class)->name('product');
            Route::get('/create',ProductCreate::class)->name('product.create');
        });

    });
});

Route::get('/', function () {
    return view('welcome');
});

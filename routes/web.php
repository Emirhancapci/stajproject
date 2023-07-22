<?php

use App\Models\Website;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SubcategoryController;

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



Route::prefix('admin')->middleware('isAdmin')->group(function () {

    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // CATEGORY
    Route::name('category.')->controller(CategoryController::class)->group(function () {
        Route::get('category/list', 'list')->name('list');
        Route::get('category/create', 'create')->name('create');
        Route::post('category/store', 'store')->name('store');
        Route::get('category/edit/{id}', 'edit')->name('edit');
        Route::post('category/update/{id}', 'update')->name('update');
        Route::get('category/delete/{id}', 'delete')->name('delete');
    });

    // SUBCATEGORY
    Route::name('subCategory.')->controller(CategoryController::class)->group(function () {
        Route::get('subCategory/create', 'subCategoryCreate')->name('create');
        Route::post('subCategory/store', 'subCategoryStore')->name('store');
        Route::get('subCategory/list', 'subCategoryIndex')->name('list');
        Route::get('subCategory/edit/{id}', 'subCategoryEdit')->name('edit');
        Route::post('subCategory/update/{id}', 'subCategoryUpdate')->name('update');
        Route::get('subCategory/delete/{id}', 'subCategoryDelete')->name('delete');
    });

    // PRODUCT
    Route::name('product.')->controller(ProductController::class)->group(function () {
        Route::get('product/list', 'list')->name('list');
        Route::get('product/create', 'index')->name('create');
        Route::post('product/create','create')->name('store');
        Route::get('product/edit{id}', 'edit')->name('edit');
        Route::post('product/update{id}', 'update')->name('update');
        Route::get('product/delete{id}', 'delete')->name('delete');
    });
});

// LOGIN
// Route::get('/',[AuthController::class,"index"])->name('login');

Route::get('/login',  [AuthController::class,'index'])->name('login');

Route::post('/login',[AuthController::class, 'login'])->name('login');

Route::get('/logout',[AuthController::class, 'logout'])->name('logout');



// WEBSITE
Route::get('website',[WebsiteController::class,'index'])->name('website.index');
Route::get('website/about',[WebsiteController::class,'about'])->name('website.about');
Route::get('website/cart',[WebsiteController::class,'cart'])->name('website.cart');
Route::get('website/product-detail/{slug}',[ProductController::class,'product_detail'])->name('website.product.detail');
Route::get('website/checkout',[CheckoutController::class,'index'])->name('website.checkout');
Route::post('website/checkout', [CheckoutController::class, 'store'])->name('website.checkout');
Route::get('website/contact',[ContactController::class,'index'])->name('website.contact');
Route::post('website/contact', [ContactController::class, 'store'])->name('website.contact');
Route::get('website/products',[WebsiteController::class,'products'])->name('website.products');

//WEBSITE CART
Route::post('addToCart', [CartController::class, 'addToCart'])->name('addToCart');
Route::post('decreaseItem/{id}', [CartController::class, 'decreaseItem'])->name('decreaseItem');
Route::post('increaseItem/{id}', [CartController::class, 'increaseItem'])->name('increaseItem');
Route::post('removeItem/{id}', [CartController::class, 'removeItem'])->name('removeItem');
Route::post('clearCart', [CartController::class, 'clearCart'])->name('clearCart');

// WEBSITE REGISTER
Route::get('website/register',[WebsiteController::class,'showregister']);
Route::post('website/register', [AuthController::class, 'register'])->name('website.register');

// WEBSITE LOGIN
Route::get('website/login',[WebsiteController::class,'showlogin']);
Route::post('website/login', [AuthController::class, 'websitelogin'])->name('website.login');
Route::get('website/logout',[AuthController::class, 'websitelogout'])->name('website.logout');


// WEBSITE PRODUCT LIST
Route::get('website', [ProductController::class,'productlist']);
Route::get('website/products', [ProductController::class,'productlist1']);






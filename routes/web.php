<?php

use App\Models\Brand;
use Faker\Guesser\Name;
use App\Models\Customer;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\frontend\BlogController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\PageController;
use App\Http\Controllers\frontend\ShopController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\frontend\SearchController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\backend\SubCategoryController;

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

//////////////////////////frontend///////////////////////////

//Frontend_all

Route::get('/', [HomeController::class, 'frontendHome'])->name('home');



///////////////frontend reg & login////////////////////

Route::post('/register-submit-front', [HomeController::class, 'registerSubmitForm'])->name('register.submit.front');
Route::post('/login-submit-front', [HomeController::class, 'loginSubmitForm'])->name('login.submit.front');
Route::get('/frontlogout', [HomeController::class, 'frontLogout'])->name('front.logout');



//////////////////search/////////////////

Route::get('/search', [SearchController::class, 'search'])->name('search');




/////////////////////frontend Category routes//////////////////////////

Route::get('/shop', [ShopController::class, 'shopPage'])->name('shop.page');
Route::get('/pages-shop-details', [PageController::class, 'pagesShopDetails'])->name('pages.shop.details');

Route::get('/cart', [CartController::class, 'cartDetails'])->name('cart.details');
Route::get('/add-cart/{id}', [CartController::class, 'addCartPage'])->name('add.cart.page');
Route::get('/delete-cart-item/{id}', [CartController::class, 'deleteCartItem'])->name('delete.cart.item');
Route::get('/cart-update/{id}', [CartController::class, 'updateCartItem'])->name('update.cart.item');


///////////////////////Check-out///////////////////////

Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');

/////////////////Blog Page////////////////////////
Route::get('/blog', [BlogController::class, 'blog'])->name('blog');
Route::get('/blog-details', [BlogController::class, 'blogDetails'])->name('blog.details');



//////////////////////Contact//////////////////////////////
Route::get('/contact', [ContactController::class, 'contact'])->name('contact');








///////////////Backend////////////////

//login

Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register-submit', [AuthController::class, 'registerSubmitForm'])->name('register.submit.form');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login-submit', [AuthController::class, 'loginSubmitForm'])->name('login.submit');


//all_routes

Route::middleware('CheckAdmin')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    //Route
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard']);
    Route::get('/master-dashboard', [AdminController::class, 'master']);
    Route::get('/admin-newPage', [AdminController::class, 'newPage'])->name('admin.newPage');


    Route::get('/category-list', [CategoryController::class, 'list'])->name('category.list');
    Route::get('/category-create-from', [CategoryController::class, 'createForm'])->name('create.form');
    Route::post('/category-submit-from', [CategoryController::class, 'submitForm'])->name('submit.form');
    Route::get('/edit-category/{id}', [CategoryController::class, 'editCategory'])->name('edit.category');
    Route::put('/update-category/{id}', [CategoryController::class, 'updateCategory'])->name('update.category');
    Route::get('/delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete.category');
    Route::get('/view-category/{id}', [CategoryController::class, 'viewCategory'])->name('view.category');



    Route::get('/sub-category-list', [SubCategoryController::class, 'list'])->name('sub.category.list');
    Route::get('/sub-category-create-form', [SubCategoryController::class, 'createForm'])->name('sub.category.create.form');
    Route::post('/sub-category-submit-form', [SubCategoryController::class, 'submitForm'])->name('sub.category.submit.form');
    Route::get('/sub-category-edit/{id}', [SubCategoryController::class, 'editSubCategory'])->name('edit.sub.category');
    Route::put('/sub-category-update/{id}', [SubCategoryController::class, 'updateSubCategory'])->name('update.sub.category');
    Route::get('/delete-sub-category/{id}', [SubCategoryController::class, 'deleteSubCategory'])->name('delete.sub.category');
    Route::get('/sub-category-view/{id}', [SubCategoryController::class, 'viewSubCategory'])->name('view.sub.category');


    Route::get('/brand-list', [BrandController::class, 'list'])->name('brand.list');
    Route::get('/brand-create-form', [BrandController::class, 'createForm'])->name('brand.create.form');
    Route::post('/brand-submit-form', [BrandController::class, 'submitForm'])->name('brand.submit.form');
    Route::get('/brand-edit/{id}', [BrandController::class, 'editBrand'])->name('edit.brand');
    Route::put('/update-brand/{id}', [BrandController::class, 'updateBrand'])->name('update.brand');
    Route::get('/delete-brand/{id}', [BrandController::class, 'deleteBrand'])->name('delete.brand');
    Route::get('/brand-view/{id}', [BrandController::class, 'viewBrand'])->name('view.brand');


    Route::get('/product-list', [ProductController::class, 'list'])->name('product.list');
    Route::get('/product-create-form', [ProductController::class, 'createForm'])->name('product.create.form');
    Route::post('/product-submit-form', [ProductController::class, 'submitForm'])->name('product.submit.form');
    Route::get('/product-edit/{id}', [ProductController::class, 'editProduct'])->name('edit.product');
    Route::put('/product-update/{id}', [ProductController::class, 'updateProduct'])->name('update.product');
    Route::get('/delete-product/{id}', [ProductController::class, 'deleteProduct'])->name('delete.product');
    Route::get('/product-view/{id}', [ProductController::class, 'viewProduct'])->name('view.product');


    Route::get('/customer-list', [CustomerController::class, 'list'])->name('customer.list');
    Route::get('/customer-create-form', [CustomerController::class, 'createForm'])->name('customer.create.form');
    Route::post('/customer-submit-form', [CustomerController::class, 'submitForm'])->name('customer.submit.form');
    Route::get('/customer-edit/{id}', [CustomerController::class, 'editCustomer'])->name('edit.customer');
    Route::put('/customer-update/{id}', [CustomerController::class, 'updateCustomer'])->name('update.customer');
    Route::get('/delete-customer/{id}', [CustomerController::class, 'deleteCustomer'])->name('delete.customer');
    Route::get('/customer-view/{id}', [CustomerController::class, 'viewCustomer'])->name('view.customer');
});






// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
// Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
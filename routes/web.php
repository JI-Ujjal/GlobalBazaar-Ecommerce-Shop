<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CustomerController;
use App\Models\Brand;
use App\Models\Customer;
use PhpParser\Node\Stmt\Return_;

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

//login

Route::get('/register-form',[AuthController::class,'registerForm'])->name('register.Form');
Route::post('/register-submit-form',[AuthController::class,'registerSubmitForm'])->name('register.submit.form');

Route::get('/',[AuthController::class,'loginForm'])->name('login');
Route::post('/login-submit-form',[AuthController::class,'loginSubmitForm'])->name('login.post');

//all_routes

Route::group(['middleware=>CheckAdmin'],function()
{
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

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

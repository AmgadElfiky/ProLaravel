<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminProductsController;

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

Route::get('/',[ProductsController::class, "index"])
->name("allProducts");

//show all products
Route::get('products', [ProductsController::class, "index"])
->name("allProducts");

//show all products for men
Route::get('products/men', [ProductsController::class, "menProducts"])
->name("menProducts");

//show all products for women
Route::get('products/women', [ProductsController::class, "womenProducts"])
->name("womenProducts");

//search
Route::get('search', [ProductsController::class, "search"])
->name("searchProducts");

//add data to cart
Route::get('product/addToCart/{id}',[ProductsController::class, "addProductToCart"])
->name("AddToCartProduct");

//show items from cart
Route::get('cart',[ProductsController::class, "showCart"])
->name("cartproducts");

//delete itme from cart
Route::get('product/deleteItamFromCart/{id}',[ProductsController::class, "deleteItemFromCart"])
->name("DeleteItemFromCart");

//checkout page
Route::get('product/checkoutProducts/', [ProductsController::class, "checkoutProducts"])
->name("checkoutProducts");

//create an order
Route::get('product/createOrder/', [ProductsController::class, "createOrder"])
->name("createOrder");

//increase single product in cart
Route::get('product/increaseSingleProduct/{id}',[ProductsController::class, "increaseSingleProduct"])
->name("increaseSingleProduct");

//decrease single product in cart
Route::get('product/decreaseSingleProduct/{id}',[ProductsController::class, "decreaseSingleProduct"])
->name("decreaseSingleProduct");


//for Login and Register
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
->name('home');

//Admin Panel
Route::get('admin/products', [AdminProductsController::class, 'index'])
->name("adminDisplayProducts")->middleware("restrictToAdmin");

//Display edit product form
Route::get('admin/editProductForm/{id}', [AdminProductsController::class, 'editProductForm'])
->name("adminEditProductForm");

//Display edit product form
Route::get('admin/editProductImageForm/{id}', [AdminProductsController::class, 'editProductImageForm'])
->name("adminEditProductImageForm");

//update product image
Route::post('admin/updateProductImage/{id}', [AdminProductsController::class, 'updateProductImage'])
->name("adminUpdateProductImage");

//update product data
Route::post('admin/updateProduct/{id}', [AdminProductsController::class, 'updateProduct'])
->name("adminUpdateProduct");

//display create product form
Route::get('admin/createProductForm', [AdminProductsController::class, 'createProductForm'])
->name("adminCreateProductForm");

//Send new product data to DB
Route::post('admin/sendCreateProductForm', [AdminProductsController::class, 'sendCreateProductForm'])
->name("adminSendCreateProductForm");

//Delete product
Route::get('admin/deleteProduct/{id}', [AdminProductsController::class, 'deleteProduct'])
->name("adminDeleteProduct");

<?php

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

use App\Category;
use App\Product;

Route::get('/', function () {
    $category=Category::all();
    $products=Product::get()->where('main','==',1);
    return view('welcome',[
        'category'=>$category ,
        'products'=>$products,]);
});
//Route::get('/','HomeController@welcome')->name('welcome');
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/catalog/{slug}', 'catalog\CatalogController@index')->name('catalog.index');
Route::get('/category/{slug}', 'catalog\CatalogController@good')->name('catalog.good');

//Admin
Route::group(['middleware'=>'admin','prefix'=>'admin'], function(){
    Route::get('/','admin\AdminController@index')->name('index');
    //Category
    Route::get('/category','admin\CategoryController@index')->name('category');
    Route::get('/category/create','admin\CategoryController@create')->name('category.create');
    Route::post('/category/create','admin\CategoryController@createRequest');
    Route::get('/category/edit/{id}','admin\CategoryController@edit')
        ->where('id','\d+')
        ->name('category.edit');
    Route::post('/category/edit/{id}','admin\CategoryController@editRequest')
        ->where('id','\d+')
        ->name('category.edit');
    Route::delete('/category/{id}','admin\CategoryController@delete');
    //Product
    Route::get('/product','admin\ProductController@index')->name('product');
    Route::get('/product/create','admin\ProductController@create')->name('product.create');
    Route::post('/product/create','admin\ProductController@createRequest');
    Route::get('/product/edit/{id}','admin\ProductController@edit')
        ->where('id','\d+')
        ->name('product.edit');
    Route::post('/product/edit/{id}','admin\ProductController@editRequest')
        ->where('id','\d+')
        ->name('product.edit');
    Route::delete('/product/{id}','admin\ProductController@delete');
});

Route::group(['middleware'=>'user'], function(){
    Route::get('/cart','cart\CartController@index')->name('cart.index');
    Route::post('/cart','cart\CartController@indexRequest');
});
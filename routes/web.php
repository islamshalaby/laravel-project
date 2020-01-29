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

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('BackEnd')->prefix('admin')->group(function () {
    Route::get('/', 'Home@index');
    Route::resource('categories', 'Categories');
    Route::resource('subcategories', 'SubCategories');
    Route::resource('products', 'Products');
    Route::resource('contacts', 'Contacts')->except(['create', 'edit', 'store', 'update']);
    Route::resource('socialmedia', 'SocialMedia')->except(['create', 'show', 'store', 'index']);
    // Product subCategories (ajax)
    Route::get('products/subcategories/{id}', "Products@fetchSubCategories")->name('products.subCategories');
    // Product images
    Route::post('products/images', "Products@productImages")->name('products.images');
    Route::delete('products/images/{id}', "Products@deletePhoto")->name('products.images.delete');
    // Product links
    Route::get('products/links/{id}', "Products@showLinks")->name('products.links');
    Route::post('products/links/{id}', "Products@storeLinks")->name('products.addLinks');
    Route::patch('products/link/{id}', 'Products@editLink')->name('product.link.edit');
    Route::delete('products/link/{id}', 'Products@deleteLink')->name('product.link.delete');

});

<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth', 'admin']], function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Manage Products
    Route::resource('products', 'ProductController');
    Route::get('products/{id}/delete', 'ProductController@delete')->name('products.delete');

    // Manage Categories
    Route::resource('categories', 'CategoryController');
    Route::get('categories/{id}/delete', 'CategoryController@delete')->name('categories.delete');

    // Manage Orders
    Route::resource('orders', 'OrderController')->only(['index', 'show', 'destroy']);
    Route::post('orders/{id}/cancel', 'OrderController@cancel')->name('orders.cancel');

    // Manage Users
    Route::resource('users', 'UserController');
    Route::get('users/{id}/delete', 'UserController@delete')->name('users.delete');

    // Settings
    Route::get('settings', 'SettingController@index')->name('settings.index');
    Route::post('settings', 'SettingController@update')->name('settings.update');
    
});

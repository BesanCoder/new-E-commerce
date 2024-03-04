<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderManagement\SupplierController;
use App\Http\Controllers\Admin\OrderManagement\ProductController;
use App\Http\Controllers\Admin\OrderManagement\StockController;

Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    

     // Order Management 
     Route::prefix('Order-Management')->group(function () {
        Route::get('suppliers', [SupplierController::class, 'index'])->name('admin.suppliers.index');
        Route::get('suppliers/create', [SupplierController::class, 'create'])->name('admin.suppliers.create');
        Route::post('/admin/suppliers', [SupplierController::class, 'store'])->name('admin.suppliers.store');
        Route::delete('admin/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('admin.suppliers.destroy');
        Route::get('/admin/suppliers/{id}/edit', [SupplierController::class, 'edit'])->name('admin.suppliers.edit');
        Route::put('/admin/suppliers/{id}', [SupplierController::class, 'update'])->name('admin.suppliers.update');
        Route::get('products', [ProductController::class, 'index'])->name('admin.products.index');
        Route::get('stocks', [StockController::class, 'index'])->name('admin.stocks.index');
    });
    
    // Manage Users
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/users/search', [UserController::class, 'search'])->name('users.search');
    Route::put('/admin/users/{id}', [UserController::class, 'update']);
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy']);


    // Settings
    Route::get('/settings', [SettingsController::class, 'index'])->name('admin.settings');

    // Logout
    Route::post('/logout', [LogoutController::class, 'logout'])->name('admin.logout');
});

<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Admin\UserController;

Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

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

<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\RestaurantController as AdminRestaurantController;
use App\Http\Controllers\Restaurant\DashboardController as RestaurantDashboardController;
use App\Http\Controllers\Customer\HomeController as CustomerHomeController;
use App\Http\Controllers\RestaurantRegistrationController;
//Customer
Route::get('/', [CustomerHomeController::class, 'index'])->name('home');

// Show registration form (public)
Route::get('/restaurant/register', [RestaurantRegistrationController::class, 'showForm'])
    ->name('restaurant.register');

// Handle form submit
Route::post('/restaurant/register', [RestaurantRegistrationController::class, 'store'])
    ->name('restaurant.register.store'); 
    
// RESTAURANT
Route::middleware(['auth', 'role:restaurant'])
    ->prefix('restaurant')
    ->group(function () {
        Route::get('/dashboard', [RestaurantDashboardController::class, 'index'])
            ->name('restaurant.dashboard');
    });

// ADMIN
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');
        Route::patch('/restaurants/{id}/approve', [AdminRestaurantController::class, 'approve'])
    ->name('admin.restaurants.approve');
    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

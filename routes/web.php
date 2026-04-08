<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Restaurant\DashboardController as RestaurantDashboardController;
use App\Http\Controllers\Restaurant\CategoryController;
use App\Http\Controllers\Restaurant\MenuController;
use App\Http\Controllers\Restaurant\OrdersController as RestaurantOrdersController;
use App\Http\Controllers\Customer\HomeController as CustomerHomeController;
use App\Http\Controllers\Customer\CartController;
use App\Http\Controllers\RestaurantRegistrationController;

//Customer
Route::get('/', [CustomerHomeController::class, 'index'])->name('home');
Route::get('/restaurants', [CustomerHomeController::class, 'restaurants'])->name('restaurants');
Route::get('/restaurants/{id}', [CustomerHomeController::class, 'show'])->name('restaurant.show');
 Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart', [CartController::class, 'store']);
    Route::delete('/cart/{id}', [CartController::class, 'destroy']);
    Route::delete('/cart', [CartController::class, 'clear']);

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
        Route::get('/categories', [CategoryController::class, 'index'])
            ->name('restaurant.categories');
        Route::post('/categories', [CategoryController::class, 'store'])
            ->name('restaurant.categories.store');
        Route::get('/categories/{id}', [CategoryController::class, 'edit'])
            ->name('restaurant.categories.edit');
        Route::put('/categories/{id}', [CategoryController::class, 'update'])
            ->name('restaurant.categories.update');
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])
            ->name('restaurant.categories.destroy');
        Route::get('/menus', [MenuController::class, 'index'])
            ->name('restaurant.menus');
        Route::post('/menus', [MenuController::class, 'store'])
            ->name('restaurant.menus.store');
        Route::put('/menus/{id}', [MenuController::class, 'update'])
            ->name('restaurant.menus.update');
        Route::delete('/menus/{id}', [MenuController::class, 'destroy'])
            ->name('restaurant.menus.destroy');

            Route::get('/orders', [RestaurantOrdersController::class, 'index'])
            ->name('restaurant.orders');
                Route::put('/orders/{id}', [RestaurantOrdersController::class, 'update'])
            ->name('restaurant.orders.update');

                Route::get('/orders/{id}', [RestaurantOrdersController::class, 'show'])
            ->name('restaurant.orders.show');

    });

// ADMIN
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/restaurants', [RestaurantController::class, 'restaurants'])
            ->name('admin.restaurants');
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');
        Route::patch('/restaurants/{id}/approve', [RestaurantController::class, 'approve'])
    ->name('admin.restaurants.approve');
       Route::get('/users', [UserController::class, 'index'])
            ->name('admin.users');
       Route::get('/orders', [OrderController::class, 'index'])
            ->name('admin.orders');

    });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPopularController;
use App\Http\Controllers\RecentOrderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class, 'index'])->middleware('guest');
Route::post('/', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/revenue', [DashboardController::class, 'revenue']);
    Route::get('/dashboard/invoice', [DashboardController::class, 'invoice']);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::resource('/products', ProductController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/admins', AdminController::class);
    Route::resource('/customers', CustomerController::class);
    Route::resource('/roles', RoleController::class);
    Route::get('/order/recents', [RecentOrderController::class, 'index'])->name('recent_orders.index');
    Route::get('/product/populars', [ProductPopularController::class, 'index'])->name('product_populars.index');
    Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
    Route::get('/sales/{transaction}', [SalesController::class, 'show'])->name('sales.show');
    Route::post('/sales/{transaction}', [SalesController::class, 'process']);
});

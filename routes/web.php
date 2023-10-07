<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaymentLogController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductPopularController;
use App\Http\Controllers\RecentOrderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\SettingController;
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

    Route::resource('/products', ProductController::class)->middleware('can:product');
    Route::resource('/categories', CategoryController::class)->middleware('can:category');
    Route::resource('/admins', AdminController::class)->middleware('can:admin');
    Route::resource('/customers', CustomerController::class)->middleware('can:customer');
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/roles', RoleController::class);
    Route::get('/order/recents', [RecentOrderController::class, 'index'])->name('recent_orders.index')->middleware('can:recent_order');
    Route::get('/product/populars', [ProductPopularController::class, 'index'])->name('product_populars.index')->middleware('can:product_popular');
    Route::get('/sales', [SalesController::class, 'index'])->name('sales.index')->middleware('can:sales');
    Route::get('/sales/{transaction}', [SalesController::class, 'show'])->name('sales.show')->middleware('can:sales');
    Route::post('/sales/{transaction}', [SalesController::class, 'process'])->middleware('can:sales');
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index')->middleware('can:setting');
    Route::get('/paymentlogs', [PaymentLogController::class, 'index'])->name('paymentlogs.index')->middleware('can:payment_log');
    Route::delete('/settings/product', [SettingController::class, 'product'])->name('settings.product')->middleware('can:setting');
    Route::delete('/settings/transaction', [SettingController::class, 'transaction'])->name('settings.transaction')->middleware('can:setting');
});

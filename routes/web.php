<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
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

Route::get('/', [ProductsController::class, 'list'])->name('products.list');
Route::get('/products/{product:slug}/', [ProductsController::class, 'detail'])->name('products.detail');

Route::middleware(['auth', 'admin'])->group(function() {
    Route::prefix('admin')->group(function () {
        Route::get('/products', [ProductsController::class, 'index'])->name('admin.products.index');
        Route::get('/products/create', [ProductsController::class, 'create'])->name('admin.products.create');
        Route::post('/products/store', [ProductsController::class, 'store'])->name('admin.products.store');
        Route::get('/products/show/{product}', [ProductsController::class, 'show'])->name('admin.products.show');
        Route::post('/products/update/{id}', [ProductsController::class, 'update'])->name('admin.products.update');
        Route::delete('/products/delete/{product}', [ProductsController::class, 'delete'])->name('admin.products.delete');

        Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    });
});

Route::get('/login', [AuthController::class, 'login'])->middleware('guest')->name('login.show');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/signup', [UserController::class, 'show'])->middleware('guest')->name('user.show');
Route::post('/signup', [UserController::class, 'store'])->name('user.store');

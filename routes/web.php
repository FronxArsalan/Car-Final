<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Admin\TireController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;

// Route::get('/', function () {
//     return view('welcome');
// });

// login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login-process', [AuthController::class, 'loginProcess'])->name('loginProcess');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// authenticate
Route::middleware('authenticate')->group(function () {
    // dashboard


    
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('tires', TireController::class);
    Route::resource('products', ProductController::class);

    Route::get('/tire/inventory', [TireController::class, 'inventory'])->name('tires.inventory');
    // search



    
    Route::get('/tire/search', [TireController::class, 'search'])->name('tires.search');
    Route::get('tire/import', [TireController::class, 'showImportForm'])->name('tires.import.form');
    Route::post('tire/import', [TireController::class, 'import'])->name('tires.import');

});

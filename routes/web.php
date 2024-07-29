<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AboutMeController;
use App\Http\Controllers\Admin\QulificationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PortfolioController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::middleware('auth')->name('admin.')->prefix('/admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/aboutme', AboutmeController::class);
    Route::get('/qualification/education', [QulificationController::class, 'showEducation'])->name('qualification.edu');
    Route::get('/qualification/experience', [QulificationController::class, 'showExperience'])->name('qualification.exp');
    Route::resource('/qualification', QulificationController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/portfolio', PortfolioController::class);
});

Auth::routes();

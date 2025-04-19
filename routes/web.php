<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AboutMeController;
use App\Http\Controllers\Admin\QulificationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ContactController;
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
Route::post('/contact', [ContactController::class, 'submit'])->name('contacts');



Route::middleware('auth')->name('admin.')->prefix('/admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/aboutme', AboutmeController::class);
    Route::get('/qualification/education', [QulificationController::class, 'showEducation'])->name('qualification.edu');
    Route::get('/qualification/experience', [QulificationController::class, 'showExperience'])->name('qualification.exp');
    Route::resource('/qualification', QulificationController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/portfolio', PortfolioController::class);
    Route::resource('/service', ServiceController::class);
    Route::resource('/skill', SkillController::class);
    Route::resource('/review', ReviewController::class);
    Route::resource('/setting', SettingController::class);
});

Auth::routes();

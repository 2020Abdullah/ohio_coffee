<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\WelcomeController;
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

Route::get('/', [WelcomeController::class, 'index']);

// show menu 
Route::get('/menu', [WelcomeController::class, 'getMenu'])->name('menu');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth', 'verified']], function(){
    // categories routes
    Route::get("category/list", [CategoryController::class, 'index'])->name('category.list');
    Route::post("category/store", [CategoryController::class, 'store'])->name('category.store');
    Route::post("category/update", [CategoryController::class, 'update'])->name('category.update');
    Route::post("category/delete", [CategoryController::class, 'delete'])->name('category.delete');

    // food & drinks routes
    Route::get('menu/list', [MenuController::class, 'index'])->name('menu.list');
    Route::get('menu/add', [MenuController::class, 'add'])->name('menu.add');
    Route::post('menu/store', [MenuController::class, 'store'])->name('menu.store');
    Route::get('menu/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
    Route::post('menu/update', [MenuController::class, 'update'])->name('menu.update');
    Route::post('menu/delete', [MenuController::class, 'delete'])->name('menu.delete');

    // contact
    Route::get('contact/view', [ContactController::class, 'index'])->name('contact');
    Route::post('contact/update', [ContactController::class, 'update'])->name('contact.update');

    // slider 
    Route::get('slider/setting', [SliderController::class, 'slider'])->name('slider');
    Route::post('slider/store', [SliderController::class, 'sliderAdd'])->name('slider.add');
    Route::post('slider/update', [SliderController::class, 'sliderUpdate'])->name('slider.update');
    Route::post('slider/delete', [SliderController::class, 'sliderDelete'])->name('slider.delete');

    // profile
    Route::get('profile', [ContactController::class, 'profile'])->name('profile');
    Route::post('profile/update', [ContactController::class, 'profileUpdate'])->name('profile.update');

});


require __DIR__.'/auth.php';

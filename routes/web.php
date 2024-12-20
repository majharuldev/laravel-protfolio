<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\ProfileController;
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




Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/logout','destroy')->name('admin.logout');
    Route::get('/admin/profile','profile')->name('admin.profile');
    Route::get('/admin/edit','edit')->name('edit.profile');
    Route::post('/admin/store','store')->name('store.profile');

    Route::get('/change/password','changePassword')->name('change.password');
    Route::post('/update/password','updatePassword')->name('update.password');



});

Route::controller(HomeController::class)->group(function(){

        Route::get('/home/slide','homeSlide')->name('home.slide');
        Route::post('/update/slide','updateSlide')->name('update.slide');


});

Route::controller(AboutController::class)->group(function(){

    Route::get('/about/page','About')->name('about.page');
    Route::post('/update/about','updateAbout')->name('update.about');
    Route::get('/about','FrontAbout')->name('front.about');


});




require __DIR__.'/auth.php';

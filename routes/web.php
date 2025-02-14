<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Division\DivisionController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Aqua\AquaController;
use App\Http\Controllers\Cat\CatController;
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
    return view('welcome');
});

Route::middleware(['auth','verified'])->group(function(){

    Route::prefix('/dashboard')->group(function(){
        // Admin Section
        Route::get('/',[AdminController::class,'index'])->name('admin-dashboard');
        Route::get('/logout',[AdminController::class,'userLogout'])->name('admin-logout');

        // division section
        Route::controller(DivisionController::class)->group(function(){
            Route::get('/div-show','index')->name('div-show');
            Route::get('/div-create','create')->name('div-create');
            Route::post('/div-store','store')->name('div-store');
            Route::get('/div-edit/{id}','edit')->name('div-edit');
            Route::post('/div-upd/{id}','update')->name('div-upd');
            Route::get('/div-del/{id}','destroy')->name('div-del');
        });

        // User section
        Route::controller(UserController::class)->group(function(){
            Route::get('/user-show','index')->name('user-show');
            Route::get('/user-create','create')->name('user-create');
            Route::post('/user-store','store')->name('user-store');
            Route::get('/user-edit/{id}','edit')->name('user-edit');
            Route::post('/user-upd/{id}','update')->name('user-upd');
            Route::get('/user-del/{id}','destroy')->name('user-del');

            // Password Reset
            Route::get('/user-pwd','pwdReset')->name('user-pwd');
            Route::post('/user-pwd','pwdStore')->name('user-pwd-store');
        });

        // Cat. Section
        Route::controller(CatController::class)->group(function(){
            Route::get('/cat-show','index')->name('cat-show');
            Route::get('/cat-create','create')->name('cat-create');
            Route::post('/cat-store','store')->name('cat-store');
            Route::get('/cat-edit/{id}','edit')->name('cat-edit');
            Route::post('/cat-upd/{id}','update')->name('cat-upd');
            Route::get('/cat-del/{id}','destroy')->name('cat-del');
        });

        // Aqua Section
        Route::controller(AquaController::class)->group(function(){
            Route::get('/aqua-show','index')->name('aqua-show');
            Route::get('/aqua-create','create')->name('aqua-create');
            Route::post('/aqua-store','store')->name('aqua-store');
            Route::get('/aqua-edit/{id}','edit')->name('aqua-edit');
            Route::post('/aqua-upd/{id}','update')->name('aqua-upd');
            Route::get('/aqua-del/{id}','destroy')->name('aqua-del');
        });

    });





});

/* Route::get('/dashboard', function () {
    return view('backend.dashboard'); //dashboard
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

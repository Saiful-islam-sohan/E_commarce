<?php

use App\Http\Controllers\backend\CatagoryController as BackendCatagoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\frontend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TestimonialController;
use PHPUnit\TextUI\XmlConfiguration\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/dashboard', function () {
//     return view('backend.pages.dashboard');
// })->middleware('auth')->name('dashboard');

// Route::get('/', function () {
//     return view('frontend.pages.home');
// });

Route::prefix('')->group(function(){
    Route::get('/',[HomeController::class,'home'])->name('home');
    // Route::get('/shope',[HomeController::class,'shoppage'])->name('shop.page');
    Route::get('/shope',[HomeController::class,'shopPage'])->name('shope');

});




Route::prefix('/admin')->group(function(){

    Route::get('/login',[LoginController::class,'loginpage'])->name('admin.loginpage');
    Route::post('/login',[LoginController::class,'login'])->name('admin.login');
    Route::get('/logout',[LoginController::class,'loginpage'])->name('admin.logout');

    // Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard')->middleware('auth');

      Route::middleware('auth')->group(function(){
                 Route::get('dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');
      });

Route::resource('/catagory',BackendCatagoryController::class);
Route::resource('/testimonial',TestimonialController::class);
Route::resource('/products',ProductController::class);

});





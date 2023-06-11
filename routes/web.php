<?php

use App\Http\Controllers\backend\CatagoryController as BackendCatagoryController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\CatagoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\frontend\auth\RegisterController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CustomerControler;
use App\Http\Controllers\frontend\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TestimonialController;
use App\Models\CouponController;
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
    Route::get('/single-product/{product_slug}', [HomeController::class, 'productDetails'])->name('productdetail.page');
    Route::get('/shopping_cart',[CartController::class,'cartPage'])->name('cart.page');
    Route::post('/addtocart',[CartController::class,'AddTocart'])->name('add-to.cart');
    Route::get('/remove-from-cart/{cart_id}', [CartController::class, 'removeFromCart'])->name('removefrom.cart');
    // customer authentication

    // Route::get('/register',[RegisterController::class],'registerpage')->name('register_page');
    // Route::Post('/register',[RegisterController::class],'registerStore')->name('register.store');
    // Route::get('/login', [RegisterController::class, 'loginPage'])->name('login.page');
    // Route::post('/login', [RegisterController::class, 'loginStore'])->name('login.store');

    Route::get('/register',[RegisterController::class,'registerPage'])->name('register_page_c');
    Route::post('/register',[RegisterController::class,'registerStore'])->name('registore_store_c');
    Route::get('/login',[RegisterController::class,'loginPage'])->name('login_page');
    Route::post('/login',[RegisterController::class,'loginStore'])->name('login_store');


    // Route::prefix('customer/')->middleware('auth')->group(function(){
    //     Route::get('dashboard',[CustomerControler::class, 'dashboard'])->name('customer.dashboard');
    //     Route::get('logout', [RegisterController::class, 'logout'])->name('customer.logout');

    // });

   Route::prefix('customer/')->middleware(['auth','is_customer'])->group(function(){

    Route::get('dashboard',[CustomerControler::class,'dashboard'])->name('customer_dashboard');
    Route::get('/logout',[RegisterController::class,'logout'])->name('customer_logout');

   });



});




Route::prefix('/admin')->group(function(){

    Route::get('/login',[LoginController::class,'loginpage'])->name('admin.loginpage');
    Route::post('/login',[LoginController::class,'login'])->name('admin.login');
    // Route::get('/logout',[LoginController::class,'loginpage'])->name('admin.logout');

    // Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard')->middleware('auth');

      Route::middleware(['auth','is_admin'])->group(function(){
                 Route::get('dashboard',[DashboardController::class,'dashboard'])->name('admin.dashboard');
                 Route::get('/logout',[LoginController::class,'logout'])->name('admin.logout');
      });

Route::resource('/catagory',BackendCatagoryController::class);
Route::resource('/testimonial',TestimonialController::class);
Route::resource('/products',ProductController::class);
Route::resource('/coupon',CouponController::class);

});





<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\ForgotPassController;
use App\Http\Controllers\AdmingameaddController;
use App\Http\Controllers\AdminhomeController;
use App\Http\Controllers\AdmintableController;
use App\Http\Controllers\SellerAddProductController;

Route::get('/', function () {
    return view('HomePage');
});

Route::get('/usrlogin', [AuthController::class, 'showLogin'])->name('login');

Route::get('/faq', [FAQController::class, 'show'])->name('faq');

Route::get('/contacts', [ContactController::class, 'show'])->name('contacts');

Route::get('/About', [AboutController::class, 'show'])->name('About');

Route::get('/homepage', [HomePageController::class, 'index'])->name('homepage');

Route::get('/cart', [CartController::class, 'show'])->name('cart');

Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout');

Route::get('/detail', [DetailController::class, 'show'])->name('detail');

Route::get('/shop', [ShopController::class, 'show'])->name('shop');

Route::get('/wishlist', [WishlistController::class, 'show'])->name('wishlist');

Route::get('/forgotpass', [ForgotPassController::class, 'show'])->name('forgotpass');

Route::get('/adminaddgame', [AdmingameaddController::class, 'show'])->name('adminaddgame');

Route::get('/admintable', [AdmintableController::class, 'show'])->name('admintable');

Route::get('/adminhome', [AdminhomeController::class, 'show'])->name('adminhome');

Route::get('/selleraddprod', [SellerAddProductController::class, 'show'])->name('selleraddprod');



    Route::post('/usrlogin/login', [AuthController::class, 'login']);
    


Route::post('/usrlogin/register', [AuthController::class, 'register']);
Route::post('/forgotpass/success', [ForgotPassController::class, 'resetPassword']);
// Route::get('/usrlogin/login', function() {
//     return 'This route only supports POST';
// });
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
use App\Http\Controllers\homepagejoki;
use App\Http\Controllers\GameController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\MyproductController;

Route::get('/', function () {
    return view('HomePage');
});

Route::get('/usrlogin', [AuthController::class, 'showLogin'])->name('login');

Route::get('/homejoki', [homepagejoki::class, 'show'])->name('homejoki');

Route::get('/faq', [FAQController::class, 'show'])->name('faq');

Route::get('/contacts', [ContactController::class, 'show'])->name('contacts');

Route::get('/About', [AboutController::class, 'show'])->name('About');

Route::get('/homepage', [HomePageController::class, 'index'])->name('homepage');

Route::get('/cart', [CartController::class, 'show'])->name('cart');

Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout');

Route::get('/detail', [DetailController::class, 'show'])->name('detail');

Route::get('/shop', [ShopController::class, 'show'])->name('shop');

// Dynamic product route
Route::get('/shop/{ID_game}', [ShopController::class, 'showCatalogByGame'])->name('shop.byGame');

Route::get('/wishlist', [WishlistController::class, 'show'])->name('wishlist');

Route::get('/forgotpass', [ForgotPassController::class, 'show'])->name('forgotpass');

Route::get('/adminaddgame', [AdmingameaddController::class, 'show'])->name('adminaddgame');

Route::get('/admintable', [AdmintableController::class, 'show'])->name('admintable');

Route::get('/adminhome', [AdminhomeController::class, 'show'])->name('adminhome');

Route::get('/selleraddprod', [SellerAddProductController::class, 'show'])->name('selleraddprod');

Route::get('/wishlist', [WishlistController::class, 'show'])->name('wishlist');

    Route::post('/usrlogin/login', [AuthController::class, 'login']);
    
    // web.php
    Route::post('/logout', function () {
        Auth::logout();
        \Log::info('User logged out'); // Tambahkan log ini
        return redirect('/usrlogin');
    })->name('logout');
Route::post('/usrlogin/register', [AuthController::class, 'register']);
Route::post('/forgotpass/success', [ForgotPassController::class, 'resetPassword']);
Route::get('/', [GameController::class, 'index']);
Route::get('/', [CatalogController::class, 'index']);
Route::get('/shop/{ID_game}', [ShopController::class, 'showCatalogByGame'])->name('shop.byGame');
Route::get('/shop', [ShopController::class, 'index'])->name('shop');

Route::get('/admin-and-seller', function () {
    return view('Admin and Seller');
})->name('Admin and Seller');
Route::get('/myproduct-seller', [MyproductController::class, 'show'])->name('MyproductSeller');
Route::get('/homepagejoki', function () {
    return view('HomePageJoki');
})->name('HomePageJoki');

Route::get('/product/{id_catalog}', [DetailController::class, 'show'])->name('product.show');
// Route::get('/usrlogin/login', function() {
//     return 'This route only supports POST';
// });



Route::post('/wishlist/add', [WishlistController::class, 'add'])->name('wishlist.add');

Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
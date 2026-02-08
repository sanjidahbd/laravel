<?php
use App\Http\Controllers\FoodItemController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReviewController;

use App\Http\Controllers\SslCommerzPaymentController;
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
    return view('fronted.pages.home');
});



Route::get('/dashboard', function () {
    return view('backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


 // Customer Dashboard & Menu
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/menu', [CustomerController::class, 'index'])->name('customer.menu');
    Route::get('/order/review/{id}', [ReviewController::class, 'create'])->name('order.review.create');
    
    
    Route::post('/order/review/store', [ReviewController::class, 'store'])->name('review.store');
    
    Route::get('/reviews', [ReviewController::class, 'index'])->name('customer.reviews');
    // Step 1: My Orders Route (Ekhane add korun)
    Route::get('/my-orders', [CustomerController::class, 'myOrders'])->name('customer.orders');
    Route::post('/pay', [SslCommerzPaymentController::class, 'index'])->name('pay');
    // Final Order placement
    Route::post('/place-order', [CustomerController::class, 'placeOrder'])->name('order.place');
    // Customer-এর জন্য ডিটেইলস রাউট
Route::get('/order-details/{id}', [CustomerController::class, 'orderDetails'])->name('order.details');
});

// Cart functionality (Login charao hote pare, tai group-er baire)
Route::post('/add-to-cart/{id}', [CustomerController::class, 'addToCart'])->name('cart.add');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
   
});
//Admin Login,Logout
Route::middleware('guest:admin')->prefix('admin')->group( function () {

    Route::get('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'create'])->name('admin.login');
    Route::post('login', [App\Http\Controllers\Auth\Admin\LoginController::class, 'store']);

    //Route::get('register', [App\Http\Controllers\Auth\Admin\RegisterController::class, 'create'])->name('admin.register');
    //Route::post('register', [App\Http\Controllers\Auth\Admin\RegisterController::class, 'store']);

});

Route::middleware('auth:admin')->prefix('admin')->group( function () {

    Route::post('logout', [App\Http\Controllers\Auth\Admin\LoginController::class, 'destroy'])->name('admin.logout');


    Route::view('/dashboard','backend.admin_dashboard');
Route::resource('categories', CategoryController::class);
Route::resource('subcategories', SubcategoryController::class);
Route::resource('fooditems', FoodItemController::class);
Route::get('/reviews/all', [ReviewController::class, 'adminReviews'])->name('admin.all.reviews');
    Route::get('/reviews/delete/{id}', [ReviewController::class, 'deleteReview'])->name('admin.review.delete');
// Admin Order Management
Route::get('/orders/all', [App\Http\Controllers\AdminOrderController::class, 'allOrders'])->name('admin.orders.all');

// Order Status (Cooking/Served) - Form theke ashe tai POST thik ache
Route::post('/orders/update-status/{id}', [App\Http\Controllers\AdminOrderController::class, 'updateStatus'])->name('admin.order.update');


Route::post('/orders/update-payment-status/{id}', [App\Http\Controllers\AdminOrderController::class, 'updatePaymentStatus'])->name('admin.order.payment_update');
// View Details
Route::get('/admin/order/details/{id}', [App\Http\Controllers\AdminOrderController::class, 'viewOrder'])->name('admin.order.view');
});

//Chef Login,Logout
Route::middleware('guest:chef')->prefix('chef')->group( function () {

    Route::get('login', [App\Http\Controllers\Auth\Chef\LoginController::class, 'create'])->name('chef.login');
    Route::post('login', [App\Http\Controllers\Auth\Chef\LoginController::class, 'store']);

    //Route::get('register', [App\Http\Controllers\Auth\Admin\RegisterController::class, 'create'])->name('admin.register');
    //Route::post('register', [App\Http\Controllers\Auth\Admin\RegisterController::class, 'store']);

});

Route::middleware('auth:chef')->prefix('chef')->group( function () {

    Route::post('logout', [App\Http\Controllers\Auth\Chef\LoginController::class, 'destroy'])->name('chef.logout');


    Route::view('/dashboard','backend.chef_dashboard');

});
// ... uporer admin/chef route gulo thakbe ...






// Success/Fail/Cancel route-gulo oboshshoi thakte hobe
Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']); 


require __DIR__.'/auth.php';

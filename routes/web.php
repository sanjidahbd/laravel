<?php
use App\Http\Controllers\FoodItemController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
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
;

 // Customer Dashboard & Menu
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/menu', [CustomerController::class, 'index'])->name('customer.menu');
    
    // Step 1: My Orders Route (Ekhane add korun)
    Route::get('/my-orders', [CustomerController::class, 'myOrders'])->name('customer.orders');
    
    // Final Order placement
    Route::post('/place-order', [CustomerController::class, 'placeOrder'])->name('order.place');
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
// Admin Order Management
    Route::get('/orders/all', [App\Http\Controllers\AdminOrderController::class, 'allOrders'])->name('admin.orders.all');
    Route::post('/orders/update-status/{id}', [App\Http\Controllers\AdminOrderController::class, 'updateStatus'])->name('admin.order.update');
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


require __DIR__.'/auth.php';

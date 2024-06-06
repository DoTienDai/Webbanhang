<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Auth\LoginController;
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
//Frontend
Route::get('/', [HomeController::class, 'index']);
Route::get('trangchu', [HomeController::class, 'index'])->name('home');
Route::get('tim-kiem', [HomeController::class, 'search'])->name('search');
//Danh muc san pham trang chu
Route::get('chi-tiet/{product_name}', [ProductController::class, 'details_product'])->name('show_details');
Route::get('danh-muc/{category_id}', [CategoryProductController::class, 'show_category_home'])->name('show_category');
Route::get('thuong-hieu/{brand_id}', [BrandProductController::class, 'show_brand_home'])->name('show_brand');

//BackEnd
//dang nhap
Route::get('admin', [AdminController::class, 'admin']);
Route::get('admin', [AdminController::class, 'login'])->name('login');

//trang dashboard
Route::get('layout', [AdminController::class, 'layout'])->name('layout');
Route::post('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

//Categoryproduct
Route::get('add-category-product', [CategoryProductController::class, 'add_category_product'])->name('add_category_product');
Route::get('all-category-product', [CategoryProductController::class, 'all_category_product'])->name('all_category_product');
Route::post('save-category-product', [CategoryProductController::class, 'save_category_product'])->name('save_category_product');

Route::get('unactive-category-product/{category_product_id}', [CategoryProductController::class, 'unactive_category_product'])->name('unactive_category_product');
Route::get('active-category-product/{category_product_id}', [CategoryProductController::class, 'active_category_product'])->name('active_category_product');
//Sua
Route::get('edit-category-product/{category_product_id}', [CategoryProductController::class, 'edit_category_product'])->name('edit_category_product');
Route::post('update-category-product/{category_product_id}', [CategoryProductController::class, 'update_category_product'])->name('update_category_product');
//Xoa
Route::get('delete-category-product/{category_product_id}', [CategoryProductController::class, 'delete_category_product'])->name('delete_category_product');

//Brandproduct
Route::get('add-brand-product', [BrandProductController::class, 'add_brand_product'])->name('add_brand_product');
Route::get('all-brand-product', [BrandProductController::class, 'all_brand_product'])->name('all_brand_product');
Route::post('save-brand-product', [BrandProductController::class, 'save_brand_product'])->name('save_brand_product');

Route::get('unactive-brand-product/{brand_product_id}', [BrandProductController::class, 'unactive_brand_product'])->name('unactive_brand_product');
Route::get('active-brand-product/{brand_product_id}', [BrandProductController::class, 'active_brand_product'])->name('active_brand_product');
//Sua
Route::get('edit-brand-product/{brand_product_id}', [BrandProductController::class, 'edit_brand_product'])->name('edit_brand_product');
Route::post('update-brand-product/{brand_product_id}', [BrandProductController::class, 'update_brand_product'])->name('update_brand_product');
//Xoa
Route::get('delete-brand-product/{brand_product_id}', [BrandProductController::class, 'delete_brand_product'])->name('delete_brand_product');

//Product
Route::get('all-product', [ProductController::class, 'all_product'])->name('all_product');
Route::get('add-product', [ProductController::class, 'add_product'])->name('add_product');
Route::post('save-product', [ProductController::class, 'save_product'])->name('save_product');

Route::get('unactive-product/{product_id}', [ProductController::class, 'unactive_product'])->name('unactive_product');
Route::get('active-product/{product_id', [ProductController::class, 'active_product'])->name('active_product');
Route::get('edit-product/{product_id}', [ProductController::class, 'edit_product'])->name('edit_product');
Route::post('update-product/{product_id}', [ProductController::class, 'update_product'])->name('updatate_product');
Route::get('delete-product/{product_id}', [ProductController::class, 'delete_product'])->name('delete_product');
// gio hang
Route::post('/update-cart-quantity', [CartController::class, 'update_cart_quantity']);
Route::post('/update-cart', [CartController::class, 'update_cart']);
Route::post('/save-cart', [CartController::class, 'save_cart']);
Route::post('/add-cart-ajax', [CartController::class, 'add_cart_ajax']);
Route::get('/show-cart', [CartController::class, 'show_cart']);
Route::get('/gio-hang', [CartController::class, 'gio_hang']);
Route::get('/delete-to-cart/{rowId}', [CartController::class, 'delete_to_cart']);
Route::get('/del-product/{session_id}', [CartController::class, 'delete_product']);
Route::get('/del-all-product', [CartController::class, 'delete_all_product']);

//check out

Route::get('/dang-nhap', [CheckoutController::class, 'login_checkout']);
Route::get('/del-fee', [CheckoutController::class, 'del_fee']);
Route::get('/logout-checkout', [CheckoutController::class, 'logout_checkout']);
Route::post('/add-customer', [CheckoutController::class, 'add_customer']);
Route::post('/order-place', [CheckoutController::class, 'order_place']);
Route::post('/login-customer', [CheckoutController::class, 'login_customer']);
Route::get('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/payment', [CheckoutController::class, 'payment']);
Route::post('/save-checkout-customer', [CheckoutController::class, 'save_checkout_customer']);
Route::post('/calculate-fee', [CheckoutController::class, 'calculate_fee']);
Route::post('/select-delivery-home', [CheckoutController::class, 'select_delivery_home']);
Route::post('/confirm-order', [CheckoutController::class, 'confirm_order']);

// account

Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'edit'])->name('account.edit');
    Route::post('/account', [AccountController::class, 'update'])->name('account.update');
    Route::post('/account/deactivate', [AccountController::class, 'deactivate'])->name('account.deactivate');
});

//login user

Route::get('/dangnhap', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/dangnhap', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');





//thoat
Route::get('logout', [AdminController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

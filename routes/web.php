<?php

use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\ExcelController;
use App\Http\Controllers\Admin\InventoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Client\WishlistController;
use App\Http\Controllers\Client\CompareController;
use App\Http\Controllers\Client\CommentController;

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
// Client Controller
Route::get('/', [ClientController::class, 'home'])->name('theme.home');

Route::get('/404', [ClientController::class, 'error'])->name('theme.error');

Route::get('/dang-nhap', [ClientController::class, 'loginClient'])->name('theme.login_client');
// Route::post('/dang-nhap', [ClientController::class, 'loginPostClient'])->name('theme.login_post_client');
Route::get('/dang-ky', [ClientController::class, 'registerClient'])->name('theme.register_client');
Route::get('/tai-khoan', [ClientController::class, 'account'])->name('theme.account');

Route::get('/gioi-thieu', [ClientController::class, 'about'])->name('theme.about');
Route::get('/lien-he', [ClientController::class, 'contact'])->name('theme.contact');

Route::get('/cua-hang', [ClientController::class, 'shop'])->name('theme.shop');
Route::get('/danh-muc/{category_slug?}', [ClientController::class, 'category'])->name('theme.category');
// Route::get('/san-pham-chi-tiet', [ClientController::class, 'productDetail'])->name('theme.product_detail');
// Chi tiết sản phẩm
Route::get('/san-pham/{product_slug?}', [ClientController::class, 'productDetail'])->name('theme.product_detail');

Route::get('/bai-viet', [ClientController::class, 'blog'])->name('theme.blog');
Route::get('/bai-viet/the-nhan/{slug_tag?}', [ClientController::class, 'blogByTag'])->name('theme.blog_by_tag');
Route::get('/bai-viet/{slug_post?}', [ClientController::class, 'blogDetail'])->name('theme.blog_detail');

Route::get('/du-an', [ClientController::class, 'project'])->name('theme.project');
Route::get('/du-an/the-nhan/{slug_tag?}', [ClientController::class, 'projectByTag'])->name('theme.project_by_tag');
Route::get('/du-an/{slug_project?}', [ClientController::class, 'projectDetail'])->name('theme.project_detail');

Route::get('/gio-hang', [CartController::class, 'showCart'])->name('theme.show_cart');
Route::post('/gio-hang/add/{product?}', [CartController::class, 'addToCart'])->name('theme.add_to_cart');
Route::post('/gio-hang/add-selected', [CartController::class, 'addSelected'])->name('theme.add_selected');
Route::post('/gio-hang/update/{product?}', [CartController::class, 'updateCartItem'])->name('theme.update_cart_item');
Route::post('/gio-hang/delete/{product?}', [CartController::class, 'removeCartTable'])->name('theme.remove_item');
Route::post('/gio-hang/clear', [CartController::class, 'clearCart'])->name('theme.clear_cart');
Route::get('/thanh-toan', [ClientController::class, 'checkout'])->name('theme.checkout');

Route::get('/faq', [ClientController::class, 'faq'])->name('theme.faq');
Route::get('/tim-kiem', [ClientController::class, 'search'])->name('theme.search');
Route::get('/thuong-hieu/{slug_brand?}', [ClientController::class, 'brand'])->name('theme.brand');

// End Client

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware(['auth', 'accessAdminPanel'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/role', RoleController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/unit', UnitController::class);
    Route::resource('/brand', BrandController::class);
    Route::resource('/discount', DiscountController::class);
    Route::resource('/inventory', InventoryController::class);
    Route::resource('/product', ProductController::class);
    Route::resource('/tag', TagController::class);
    Route::resource('/post', PostController::class);
    Route::resource('/agency', AgencyController::class);
    Route::prefix('/excel')->group(function() {
        Route::post('/import-products', [ExcelController::class, 'importProducts'])->name('admin.excel.import-products');
        Route::get('/export-products', [ExcelController::class, 'exportProducts'])->name('admin.excel.export-products');
    });
    Route::prefix('user')->group(function() {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::post('/', [UserController::class, 'store'])->name('admin.user.store');
        Route::post('/edit/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::post('/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
    });

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/yeu-thich', [WishlistController::class, 'index'])->name('theme.wishlist');
    Route::post('/yeu-thich/xoa/{id?}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    Route::post('/yeu-thich/xoa-da-chon', [WishlistController::class, 'destroy_selected'])->name('wishlist.destroy_selected');
});

//them|xoa sp yeu thich
Route::post('/them-yeu-thich/{product_id}', [WishlistController::class, 'addToWishlist'])->name('addToWishlist');

//so sánh
Route::get('/so-sanh', [CompareController::class, 'showCompare'])->name('theme.compare');
Route::get('so-sanh/them-san-pham', [CompareController::class, 'storeSession'])->name('storeSession');

//comment
Route::get('cmt/{id}', [CommentController::class, 'getPostComment'])->name('theme.comment');
Route::post('cmt/{id}/{cmt_id}/{is_post}', [CommentController::class, 'store'])->name('theme.storeComment');
Route::patch('hcmt/{id}', [CommentController::class, 'hideComment'])->name('theme.hideComment');
Route::post('delcmt/{id}', [CommentController::class, 'destroy'])->name('theme.destroyComment');
Route::patch('ecmt/{id}', [CommentController::class, 'update'])->name('theme.editComment');

require __DIR__.'/auth.php';

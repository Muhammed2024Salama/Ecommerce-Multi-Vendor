<?php

use App\Http\Controllers\ProfileController;
use Ecommerce\Backend\Controllers\Admin\AdminController;
use Ecommerce\Base\Auth\Controllers\GoogleAuthController;
use Ecommerce\Base\Auth\Controllers\SocialiteController;
use Ecommerce\Frontend\Controllers\CartController;
use Ecommerce\Frontend\Controllers\CheckOutController;
use Ecommerce\Frontend\Controllers\FlashSaleController;
use Ecommerce\Frontend\Controllers\FrontendProductController;
use Ecommerce\Frontend\Controllers\HomeController;
use Ecommerce\Frontend\Controllers\PaymentController;
use Ecommerce\Frontend\Controllers\UserAddressController;
use Ecommerce\Frontend\Controllers\UserDashboardController;
use Ecommerce\Frontend\Controllers\UserProfileController;
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

/** View Frontend Template  */

Route::get('/', [
    HomeController::class,
    'index'
])
    ->name('home');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


/** Redirect To Admin Login  */

Route::get('admin/login', [
    AdminController::class,
    'login'
])
    ->name('admin.login');

Route::get('flash-sale', [
    FlashSaleController::class,
    'index'
])
    ->name('flash-sale');

/** Product route */

Route::get('products', [
    FrontendProductController::class,
    'productsIndex'
])
    ->name('products.index');

Route::get('product-detail/{slug}', [
    FrontendProductController::class,
    'showProduct'
])
    ->name('product-detail');

Route::get('change-product-list-view', [
    FrontendProductController::class,
    'chageListView'
])
    ->name('change-product-list-view');

/** Cart routes */

Route::post('add-to-cart', [
    CartController::class,
    'addToCart'
])
    ->name('add-to-cart');

Route::get('cart-details', [
    CartController::class,
    'cartDetails'
])
    ->name('cart-details');

Route::post('cart/update-quantity', [
    CartController::class,
    'updateProductQty'
])
    ->name('cart.update-quantity');

Route::get('clear-cart', [
    CartController::class,
    'clearCart'
])
    ->name('clear.cart');

Route::get('cart/remove-product/{rowId}', [
    CartController::class,
    'removeProduct'
])
    ->name('cart.remove-product');

Route::get('cart-count', [
    CartController::class,
    'getCartCount'
])
    ->name('cart-count');

Route::get('cart-products', [
    CartController::class,
    'getCartProducts'
])
    ->name('cart-products');

Route::post('cart/remove-sidebar-product', [
    CartController::class,
    'removeSidebarProduct'
])
    ->name('cart.remove-sidebar-product');

Route::get('cart/sidebar-product-total', [
    CartController::class,
    'cartTotal'
])
    ->name('cart.sidebar-product-total');

Route::get('apply-coupon', [
    CartController::class,
    'applyCoupon'
])
    ->name('apply-coupon');

Route::get('coupon-calculation', [
    CartController::class,
    'couponCalculation'
])
    ->name('coupon-calculation');

/** Coupon routes */

Route::get('apply-coupon', [
    CartController::class,
    'applyCoupon'
])
    ->name('apply-coupon');

Route::get('coupon-calculation',
    [
        CartController::class,
        'couponCalculation'
    ])
    ->name('coupon-calculation');

/** Checkout routes */
Route::get('checkout', [
    CheckOutController::class,
    'index'
])
    ->name('checkout');

Route::post('checkout/address-create', [
    CheckOutController::class,
    'createAddress'
])
    ->name('checkout.address.create');

Route::post('checkout/form-submit', [
    CheckOutController::class,
    'checkOutFormSubmit'
])
    ->name('checkout.form-submit');

/** Payment Routes */

Route::get('payment', [
    PaymentController::class,
    'index'])
    ->name('payment');

Route::get('payment-success', [
    PaymentController::class,
    'paymentSuccess'
])
    ->name('payment.success');

/** Paypal routes */

Route::get('paypal/payment', [
    PaymentController::class,
    'payWithPaypal'
])
    ->name('paypal.payment');

Route::get('paypal/success', [
    PaymentController::class,
    'paypalSuccess'
])
    ->name('paypal.success');

Route::get('paypal/cancel', [
    PaymentController::class,
    'paypalCancel'
])
    ->name('paypal.cancel');

/** Stripe routes */

Route::post('stripe/payment', [
    PaymentController::class,
    'payWithStripe'
])
    ->name('stripe.payment');


/** GitHub Socialite Login */

Route::get('/auth/redirect', [
    SocialiteController::class,
    'redirectToProvider'
])
    ->name('github.login');

Route::get('/auth/callback', [
    SocialiteController::class,
    'handleProviderCallback'
]);
/** End Of GitHub Socialite Login */

/** Google Socialite Login */

Route::get('/auth/google', [
    GoogleAuthController::class,
    'redirect'
])
    ->name('google-auth');

Route::get('/auth/google/callback', [
    GoogleAuthController::class,
    'callbackGoogle'
]);

/** End Of Google Socialite Login */


/** User Dashboard  */

Route::group(['middleware' => ['auth', 'verified'], 'prefix' => 'user', 'as' => 'user.'], function () {
    Route::get('dashboard', [
        UserDashboardController::class,
        'index'
    ])
        ->name('dashboard');

    Route::get('profile', [
        UserProfileController::class,
        'index'
    ])
        ->name('profile');

    Route::put('profile', [
        UserProfileController::class,
        'updateProfile'
    ])
        ->name('profile.update');

    Route::post('profile', [
        UserProfileController::class,
        'updatePassword'
    ])
        ->name('profile.update.password');

    /** User Address Route */
    Route::resource('address', UserAddressController::class);

});


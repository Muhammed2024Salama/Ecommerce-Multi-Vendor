<?php

use Ecommerce\Backend\Controllers\Admin\AdminController;
use Ecommerce\Backend\Controllers\Admin\Advertisement\Controllers\AdvertisementController;
use Ecommerce\Backend\Controllers\Admin\Brand\Controllers\BrandController;
use Ecommerce\Backend\Controllers\Admin\Category\Controllers\CategoryController;
use Ecommerce\Backend\Controllers\Admin\ChildCategory\Controllers\ChildCategoryController;
use Ecommerce\Backend\Controllers\Admin\Coupon\Controllers\CouponController;
use Ecommerce\Backend\Controllers\Admin\FlashSale\Controllers\FlashSaleController;
use Ecommerce\Backend\Controllers\Admin\FooterGridThree\Controllers\FooterGridThreeController;
use Ecommerce\Backend\Controllers\Admin\FooterGridTwo\Controllers\FooterGridTwoController;
use Ecommerce\Backend\Controllers\Admin\FooterInfo\Controllers\FooterInfoController;
use Ecommerce\Backend\Controllers\Admin\FooterSocial\Controllers\FooterSocialController;
use Ecommerce\Backend\Controllers\Admin\HomePage\Controllers\HomePageSettingController;
use Ecommerce\Backend\Controllers\Admin\Order\Controllers\OrderController;
use Ecommerce\Backend\Controllers\Admin\Payment\Controllers\PaymentSettingController;
use Ecommerce\Backend\Controllers\Admin\Paypal\Controllers\PaypalSettingController;
use Ecommerce\Backend\Controllers\Admin\Product\Controllers\ProductController;
use Ecommerce\Backend\Controllers\Admin\Product\Controllers\ProductImageGalleryController;
use Ecommerce\Backend\Controllers\Admin\Product\Controllers\ProductVariantController;
use Ecommerce\Backend\Controllers\Admin\Product\Controllers\ProductVariantItemController;
use Ecommerce\Backend\Controllers\Admin\Product\Controllers\SellerProductController;
use Ecommerce\Backend\Controllers\Admin\ProfileController;
use Ecommerce\Backend\Controllers\Admin\Razorpay\Controllers\RazorpaySettingController;
use Ecommerce\Backend\Controllers\Admin\Settings\Controllers\SettingController;
use Ecommerce\Backend\Controllers\Admin\ShippingRule\Controllers\ShippingRuleController;
use Ecommerce\Backend\Controllers\Admin\Slider\Controllers\SliderController;
use Ecommerce\Backend\Controllers\Admin\Stripe\Controllers\StripeSettingController;
use Ecommerce\Backend\Controllers\Admin\SubCategory\Controllers\SubCategoryController;
use Ecommerce\Backend\Controllers\Admin\Subscribers\Controllers\SubscribersController;
use Ecommerce\Backend\Controllers\Admin\Transaction\Controllers\TransactionController;
use Ecommerce\Backend\Controllers\Vendor\AdminVendorProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/



/** Admin Route */
Route::get('dashboard',[
    AdminController::class ,
    'dashboard'
])
    /** Middleware & Prefix added to RouteServiceProvider */
    ->name('dashboard');

    /** Profile Routes */
Route::get('profile',[
    ProfileController::class ,
    'index'
])
    /** Middleware & Prefix added to RouteServiceProvider */
    ->name('profile');

    /** Profile Update Routes */
Route::post('profile/update',[
    ProfileController::class ,
    'updateProfile'
])
    /** Middleware & Prefix added to RouteServiceProvider */
    ->name('profile.update');

/** Profile Update Routes */
Route::post('profile/update/password',[
    ProfileController::class ,
    'updatePassword'
])
    /** Middleware & Prefix added to RouteServiceProvider */
    ->name('password.update');

/** Slider Routes */
Route::resource('slider' , SliderController::class);

/** Category Change Status */

Route::put('change-status',[
    CategoryController::class ,
    'changeStatus'
])
    ->name('category.change-status');

/** Category Routes */

Route::resource('category' , CategoryController::class);

/** Sub Category Change Status */

Route::put('subcategory/change-status',[
    SubCategoryController::class ,
    'changeStatus'
])
    ->name('sub-category.change-status');

/** Sub Category Routes */

Route::resource('sub-category' , SubCategoryController::class);

/** Chile Category Change Status */

Route::put('child-category/change-status', [
    ChildCategoryController::class ,
    'changeStatus'
])
    ->name('child-category.change-status');

/**  */
Route::get('get-subcategories', [
    ChildCategoryController::class ,
    'getSubCategories'
])
    ->name('get-subcategories');

/** Chile Category Routes */

Route::resource('child-category', ChildCategoryController::class);


/** brand Change Status */

Route::put('brand/change-status',[
    BrandController::class ,
    'changeStatus'
])
    ->name('brand.change-status');

/** brand Routes */

Route::resource('brand' , BrandController::class);

/** Vendor Profile Routes */

Route::resource('vendor-profile' , AdminVendorProfileController::class);

/** Products Profile Routes */
Route::get('product/get-subcategories', [
    ProductController::class ,
    'getSubCategories'
])
    ->name('product.get-subcategories');

Route::get('product/get-child-categories', [
    ProductController::class ,
    'getChildCategories'
])
    ->name('product.get-child-categories');

Route::put('product/change-status', [
    ProductController::class ,
    'changeStatus'
])
    ->name('product.change-status');

Route::resource('products' , ProductController::class);

/** Products image gallery route */

Route::resource('products-image-gallery', ProductImageGalleryController::class);

Route::put('products-variant/change-status', [
    ProductVariantController::class ,
    'changeStatus'
])
    ->name('products-variant.change-status');

/** Products variant route */

Route::resource('products-variant', ProductVariantController::class);

/** Products variant item route */

Route::get('products-variant-item/{productId}/{variantId}', [
    ProductVariantItemController::class ,
    'index'])
    ->name('products-variant-item.index');

Route::get('products-variant-item/create/{productId}/{variantId}' , [
    ProductVariantItemController::class ,
    'create'
])
    ->name('products-variant-item.create');

Route::post('products-variant-item', [
    ProductVariantItemController::class ,
    'store'
])
    ->name('products-variant-item.store');

Route::get('products-variant-item-edit/{variantItemId}', [
    ProductVariantItemController::class,
    'edit'
])
    ->name('products-variant-item.edit');

Route::put('products-variant-item-update/{variantItemId}', [
    ProductVariantItemController::class,
    'update'
])
    ->name('products-variant-item.update');

Route::delete('products-variant-item/{variantItemId}', [
    ProductVariantItemController::class,
    'destroy'
])
    ->name('products-variant-item.destroy');

Route::put('products-variant-item-status', [
    ProductVariantItemController::class,
    'changeStatus'
])
    ->name('products-variant-item.change-status');

/** Seller product routes */

Route::get('seller-products', [
    SellerProductController::class ,
    'index'
])
    ->name('seller-products.index');

Route::get('seller-pending-products', [
    SellerProductController::class ,
    'pendingProducts'
])
    ->name('seller-pending-products.index');

Route::put('change-approve-status', [
    SellerProductController::class,
    'changeApproveStatus'
])
    ->name('change-approve-status');

/** Flash Sale Routes */

Route::get('flash-sale', [
    FlashSaleController::class,
    'index'
])
    ->name('flash-sale.index');

Route::put('flash-sale', [
    FlashSaleController::class,
    'update'
])
    ->name('flash-sale.update');

Route::post('flash-sale/add-product', [
    FlashSaleController::class,
    'addProduct'
])
    ->name('flash-sale.add-product');

Route::put('flash-sale/show-at-home/status-change', [
    FlashSaleController::class,
    'chageShowAtHomeStatus'
])
    ->name('flash-sale.show-at-home.change-status');

Route::put('flash-sale-status', [
    FlashSaleController::class,
    'changeStatus'
])
    ->name('flash-sale-status');

Route::delete('flash-sale/{id}', [
    FlashSaleController::class,
    'destory'
])
    ->name('flash-sale.destory');

/** Coupon Routes */

Route::put('coupons/change-status', [
    CouponController::class,
    'changeStatus'
])
    ->name('coupons.change-status');

Route::resource('coupons', CouponController::class);

/** Order routes */
Route::get('payment-status', [
    OrderController::class,
    'changePaymentStatus'
])
    ->name('payment.status');

Route::get('order-status', [
    OrderController::class,
    'changeOrderStatus'
])
    ->name('order.status');

Route::get('pending-orders', [
    OrderController::class,
    'pendingOrders'
])
    ->name('pending-orders');

Route::get('processed-orders', [
    OrderController::class,
    'processedOrders'
])
    ->name('processed-orders');

Route::get('dropped-off-orders', [
    OrderController::class,
    'droppedOfOrders'
])
    ->name('dropped-off-orders');

Route::get('shipped-orders', [
    OrderController::class,
    'shippedOrders'
])
    ->name('shipped-orders');

Route::get('out-for-delivery-orders', [
    OrderController::class,
    'outForDeliveryOrders'
])
    ->name('out-for-delivery-orders');

Route::get('delivered-orders', [
    OrderController::class,
    'deliveredOrders'
])
    ->name('delivered-orders');

Route::get('canceled-orders', [
    OrderController::class,
    'canceledOrders'
])
    ->name('canceled-orders');

Route::resource('order', OrderController::class);

/** Order Transaction route */

Route::get('transaction', [
    TransactionController::class,
    'index'
])
    ->name('transaction');

/** home page setting route */

Route::get('home-page-setting', [
    HomePageSettingController::class,
    'index'
])
    ->name('home-page-setting');

Route::put('popular-category-section', [
    HomePageSettingController::class,
    'updatePopularCategorySection'
])
    ->name('popular-category-section');

Route::put('product-slider-section-one', [
    HomePageSettingController::class,
    'updateProductSliderSectionOn'
])
    ->name('product-slider-section-one');

Route::put('product-slider-section-two', [
    HomePageSettingController::class,
    'updateProductSliderSectionTwo'
])
    ->name('product-slider-section-two');

Route::put('product-slider-section-three', [
    HomePageSettingController::class,
    'updateProductSliderSectionThree'
])
    ->name('product-slider-section-three');

/** Subscribers route */

Route::get('subscribers', [
    SubscribersController::class,
    'index'
])
    ->name('subscribers.index');

Route::delete('subscribers/{id}', [
    SubscribersController::class,
    'destory'
])
    ->name('subscribers.destory');

Route::post('subscribers-send-mail', [
    SubscribersController::class,
    'sendMail'
])
    ->name('subscribers-send-mail');

/** Advertisement Routes */

Route::get('advertisement', [
    AdvertisementController::class,
    'index'
])
    ->name('advertisement.index');

Route::put('advertisement/homepage-banner-secion-one', [
    AdvertisementController::class,
    'homepageBannerSecionOne'
])
    ->name('homepage-banner-secion-one');

Route::put('advertisement/homepage-banner-secion-two', [
    AdvertisementController::class,
    'homepageBannerSecionTwo'
])
    ->name('homepage-banner-secion-two');

Route::put('advertisement/homepage-banner-secion-three', [
    AdvertisementController::class,
    'homepageBannerSecionThree'
])
    ->name('homepage-banner-secion-three');

Route::put('advertisement/homepage-banner-secion-four', [
    AdvertisementController::class,
    'homepageBannerSecionFour'
])
    ->name('homepage-banner-secion-four');

Route::put('advertisement/productpage-banner', [
    AdvertisementController::class,
    'productPageBanner'
])
    ->name('productpage-banner');

Route::put('advertisement/cartpage-banner', [
    AdvertisementController::class,
    'cartPageBanner'
])
    ->name('cartpage-banner');

/** footer routes */

Route::resource('footer-info', FooterInfoController::class);
Route::put('footer-socials/change-status', [
    FooterSocialController::class,
    'changeStatus'
])
    ->name('footer-socials.change-status');

Route::resource('footer-socials', FooterSocialController::class);
Route::put('footer-grid-two/change-status', [
    FooterGridTwoController::class,
    'changeStatus'
])
    ->name('footer-grid-two.change-status');

Route::put('footer-grid-two/change-title', [
    FooterGridTwoController::class,
    'changeTitle'
])
    ->name('footer-grid-two.change-title');

Route::resource('footer-grid-two', FooterGridTwoController::class);

Route::put('footer-grid-three/change-status', [
    FooterGridThreeController::class,
    'changeStatus'
])
    ->name('footer-grid-three.change-status');

Route::put('footer-grid-three/change-title', [
    FooterGridThreeController::class,
    'changeTitle'
])
    ->name('footer-grid-three.change-title');

Route::resource('footer-grid-three', FooterGridThreeController::class);


/** Shipping Rule Routes */

Route::put('shipping-rule/change-status', [
    ShippingRuleController::class,
    'changeStatus'
])
    ->name('shipping-rule.change-status');

Route::resource('shipping-rule', ShippingRuleController::class);

/** settings routes */
Route::get('settings', [
    SettingController::class ,
    'index'
])
    ->name('settings.index');

Route::put('generale-setting-update', [
    SettingController::class ,
    'generalSettingUpdate'
])
    ->name('generale-setting-update');

Route::put('email-setting-update', [
    SettingController::class,
    'emailConfigSettingUpdate'
])
    ->name('email-setting-update');

Route::put('logo-setting-update', [
    SettingController::class,
    'logoSettingUpdate'
])
    ->name('logo-setting-update');

Route::put('pusher-setting-update', [
    SettingController::class,
    'pusherSettingUpdate'
])
    ->name('pusher-setting-update');


/** Payment settings routes */

Route::get('payment-settings', [
    PaymentSettingController::class,
    'index'
])
    ->name('payment-settings.index');

Route::resource('paypal-setting', PaypalSettingController::class);

Route::put('stripe-setting/{id}', [
    StripeSettingController::class,
    'update'
])
    ->name('stripe-setting.update');

Route::put('razorpay-setting/{id}', [
    RazorpaySettingController::class,
    'update'
])
    ->name('razorpay-setting.update');



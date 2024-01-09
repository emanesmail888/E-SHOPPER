<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth
use App\Http\Controllers\HomeController;
//use App\Http\Controllers\ProductsController;
use Illuminate\Routing\RouteGroup;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;


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
//Auth::routes();

Route::get('/', function () {
        return view('front/home');
    
});
// Route::get('shop', function(){
//     return view('front/shop');

// });

// Route::get('/contact', function(){
//     return view('front/contact');

// });
Route::get('/about', function(){
    return view('front/contact');

});



Route::post('addToWishList', 'HomeController@wishList')->name('addToWishList');


Route::get('/wishlist', 'HomeController@View_wishList');
Route::post('product/{id}/review','ProductReviewController@store')->name('review.store');
Route::get('review/remove/{id}','ProductReviewController@destroy')->name('review.destroy');



Route::get('/removeWishList/{id}', 'HomeController@removeWishList');
Route::get('selectSize', 'HomeController@selectSize');
Auth::routes();

Route::group(['prefix'=>'admin','middleware'=>['auth','admin']],
function(){

    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');
    //Route::get('/users', 'App\Http\Controllers\UserController@index');

    Route::resource('product','ProductsController');
    Route::resource('category','CategoriesController');
    Route::resource('subCategory','SubCategoryController');
    // Route::resource('products_types','ProductsTypesController');
    Route::POST('/admin/store', 'AdminController@store');
    Route::get('/admin', 'AdminController@index');
    Route::get('ProductEditForm/{id}', 'ProductsController@ProductEditForm')->name('ProductEditForm');

    Route::post('/editProducts/{id}', 'ProductsController@editProducts')->name('editProducts');
    Route::get('/editProducts/{id}', 'ProductsController@editProducts')->name('editProducts');
    //Route::get('/product', 'ProductsController@index');
    Route::get('/addProperty{id}', 'ProductsController@addProperty')->name('addProperty');

    Route::post('sumbitProperty','ProductsController@sumbitProperty')->name('sumbitProperty');

    Route::post('editProperty','ProductsController@editProperty');
   // Route::post('editProducts/{id}', 'ProductsController@editProducts')->name('editProducts');

 Route::get('EditImage/{id}', 'ProductsController@ImageEditForm')->name('ImageEditForm');
 Route::post('editProImage', 'ProductsController@editProImage')->name('editProImage');

 Route::get('addSale','ProductsController@addSale');

// Route::resource('/product', ProductsController::class,['names'=>[

//     'index'=>'admin.product.index',
//     // 'create'=>'admin.product.create',
//     // 'store'=>'admin.posts.store',
//     // 'update'=>'admin.product.update'

// ]]);

});


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact us');
 Route::get('shop', [App\Http\Controllers\HomeController::class, 'shop'])->name('shop');
 Route::get('/products', [App\Http\Controllers\HomeController::class, 'products'])->name('products');
 Route::get('/products/filter/{id}', [App\Http\Controllers\HomeController::class, 'filter'])->name('filter');
 Route::get('/items/{id}', [App\Http\Controllers\HomeController::class, 'showProducts'])->name('showProducts');
 Route::get('/product_details/{id}', 'HomeController@product_details')->name('product_details');
 Route::get('/cart', 'CartController@index');


 Route::put('/cart/update/{id}', 'CartController@update');

Route::get('cart/addItem/{id}', 'CartController@addItem');
Route::get('cart/addItem2/{id}', 'CartController@addItem2');
Route::get('/cart/remove/{id}','CartController@destroy');
Route::post('search', ['as' => 'search', 'uses' => 'ProductsController@search']);
Route::get('/products/{id}',  'HomeController@filter');

Route::get('logout','\app\Http\Controllers\Auth\LoginController@logout');
// Route::post('/formvalidate','CheckoutController@formValidate');
// Route::get('/thankyou', function() {
//     return view('profile.thankyou');
// });
Route::get('/newArrival', 'HomeController@newArrival');

 Route::post('/get_product_price','ProductsController@getProductPrice');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/checkout', 'CheckoutController@index');
    Route::post('/formvalidate', 'CheckoutController@formValidate');
    Route::get('/orders', 'ProfileController@orders');
    Route::get('/address', 'ProfileController@Address');
   // Route::post('/address', 'ProfileController@address');

    Route::get('/password', 'ProfileController@password');

    Route::post('/updatePassword', 'ProfileController@updatePassword');
    Route::post('/updateAddress', 'ProfileController@updateAddress');

 Route::get('EditProfileImage/{id}', 'ProfileController@ImageProfileForm')->name('ImageProfileForm');
 Route::post('editProfileImage', 'ProfileController@editProfileImage')->name('editProfileImage');

    Route::get('/profile', function() {
        return view('profile.index');
    });

     Route::get('/profile.thankyou', function() {
        return view('profile.thankyou');
    });

});


/* PayPal */
// Route::post('paypal/payment', [PaymentController::class, 'payment'])->name('paypal');
// Route::get('paypal/success', [PaymentController::class, 'success'])->name('paypal_success');
// Route::get('paypal/cancel', [PaymentController::class, 'cancel'])->name('paypal_cancel');
Route::post('paypal/payment', [App\Http\Controllers\PaymentController::class, 'payment'])->name('paypal');
Route::get('paypal/success', [App\Http\Controllers\CheckoutController::class, 'success'])->name('paypal_success');
Route::get('paypal/cancel', [App\Http\Controllers\CheckoutController::class, 'cancel'])->name('paypal_cancel');




























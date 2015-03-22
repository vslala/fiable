<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Admin Controller (/admin)
Route::get('/admin/seed/seed', [
    'uses'=>'AdminController@seed',
    'as'=>'seed'
]);

Route::get('/admin/login', [
   'uses'=>'AdminController@login',
    'as'=>'adminLogin'
]);

Route::put('/admin/login', [
    'uses'=>'AdminController@login',
    'as'=>'adminLogin'
]);

Route::get('/admin/logout', [
    'uses'=>'AdminController@logout',
    'as'=>'adminLogout'
]);

Route::get('/admin/home', [
    'uses'=>'AdminController@home',
    'as'=>'adminHome'
]);

Route::get('/admin/blog', [
    'uses'=>'AdminController@blog',
    'as'=>'adminBlog'
]);

Route::get('/admin/create', [
    'uses'=>'AdminController@create',
    'as'=>'adminCreate'
]);

Route::put('/admin/store', [
    'uses'=>'AdminController@store',
    'as'=>'adminStore'
]);

Route::get('/admin/product', [
    'uses'=>'AdminController@product',
    'as'=>'adminProduct'
]);

Route::get('/admin/edit/{blogID}', [
    'uses'=>'AdminController@edit',
    'as'=>'adminEdit'
]);

Route::put('/admin/update/{blogID}', [
    'uses'=>'AdminController@update',
    'as'=>'adminUpdate'
]);

Route::get('/admin/delete/{blogID}', [
    'uses'=>'AdminController@delete',
    'as'=>'adminDelete'
]);

Route::put('/admin/create/product', [
    'uses'=>'AdminController@newProduct',
    'as'=>'adminNew'
]);

Route::get('/admin/create/category', [
    'uses'=>'AdminController@category',
    'as'=>'adminCategory'
]);

Route::put('/admin/create/category', [
    'uses'=>'AdminController@category',
    'as'=>'adminCategory'
]);

Route::get('/admin/query/{query}', [
    'uses'=>'AdminController@reply',
    'as'=>'adminReply'
]);

Route::get('/admin/create/image', [
    'uses'=>'AdminController@addImage',
    'as'=>'adminAddImage'
]);

Route::put('/admin/create/image', [
    'uses'=>'AdminController@addImage',
    'as'=>'adminAddImage'
]);
// --------------------------------------------------------------------------------------------

/*
 * Accounts Controller
 */
Route::get('/account/signIn', [
    'uses'=>'AccountController@signIn',
    'as'=>'signIn'
]);

Route::put('/account/signIn', [
    'uses'=>'AccountController@signInAuth',
    'as'=>'signInPut'
]);

Route::get('/account/signUp', [
    'uses'=>'AccountController@signUp',
    'as'=>'signUp'
]);

Route::put('/account/signUp', [
    'uses'=>'AccountController@signUpAuth',
    'as'=>'signUpPut'
]);

Route::get('/account/signOut', [
    'uses'=>'AccountController@signOut',
    'as'=>'signOut'
]);

// Home Controller (/)
//Route::get('/{userID}', [
//    'uses'=>'HomeController@session',
//    'as'=>'setSession'
//]);

Route::get('/', [
    'uses'=>'HomeController@index',
    'as'=>'home'
]);

Route::get('/blog', [
    'uses'=>'HomeController@blog',
    'as'=>'blog'
]);

Route::get('/about', [
    'uses'=>'HomeController@about',
    'as'=>'about'
]);

Route::get('/contact', [
    'uses'=>'HomeController@contact',
    'as'=>'contact'
]);

Route::put('/store', [
    'uses'=>'HomeController@store',
    'as'=>'store'
]);

//Category Controller (/category)
Route::get('/category/handmadeItems', [
    'uses'=>'CategoryController@handmadeItems',
    'as'=>'handmadeItems'
]);

Route::get('/category/pcservice', [
    'uses'=>'CategoryController@pcservice',
    'as'=>'pcservice'
]);

Route::get('/category/electrical', [
    'uses'=>'CategoryController@electrical',
    'as'=>'electrical'
]);

Route::get('/category/photography', [
    'uses'=>'CategoryController@photography',
    'as'=>'photography'
]);

// Individual Category
Route::get('/product/greetings', [
    'uses'=>'ProductController@greetings',
    'as'=>'Greetings'
]);

Route::get('/product/envelopes', [
    'uses'=>'ProductController@envelopes',
    'as'=>'Envelopes'
]);

Route::get('/product/paintings', [
    'uses'=>'ProductController@paintings',
    'as'=>'Paintings'
]);

Route::get('/product/portraits', [
    'uses'=>'ProductController@portraits',
    'as'=>'Portraits'
]);

Route::get('/product/Letters', [
    'uses'=>'ProductController@letters',
    'as'=>'Letters'
]);

Route::get('/product/single/{pid}/{name}/{brand}/{size}/{price}/{type}/{design}/{image}', [
    'uses'=>'ProductController@single',
    'as'=>'single'
]);

Route::put('/product/query/form', [
    'uses'=>'ProductController@query',
    'as'=>'queryForm'
]);

/*
 * Individual Categories under PC Service
 */
Route::get('/category/consultant', [
    'uses'=>'CategoryController@consultant',
    'as'=>'Consultant'
]);

Route::get('/category/services', [
    'uses'=>'CategoryController@services',
    'as'=>'Services'
]);
/*
 * Cart Controller Starts here
 */
Route::get('product/cart/{pid}/{name}/{brand}/{size}/{price}/{type}/{design}/{image}/{userID}',[
    'uses'=>'CartController@add',
    'as'=>'cartAdd'
]);

Route::put('product/cart/insert',[
    'uses'=>'CartController@insertQuantity',
    'as'=>'insertQuantity'
]);

Route::get('product/cart/delete/{pid}/{userID}',[
    'uses'=>'CartController@delete',
    'as'=>'cartDelete'
]);

Route::get('product/cart/buy/{pid}/{name}/{brand}/{size}/{price}/{type}/{design}/{image}/{userID}',[
    'uses'=>'CartController@buy',
    'as'=>'buy'
]);

Route::get('product/cart/show',[
    'uses'=>'CartController@show',
    'as'=>'cartShow'
]);

Route::put('product/cart/checkout',[
    'uses'=>'CartController@checkout',
    'as'=>'checkout'
]);

Route::put('product/cart/summary',[
    'uses'=>'CartController@summary',
    'as'=>'summary'
]);

Route::get('product/cart/summary/{addressID}/{totalAmount}',[
    'uses'=>'CartController@summaryAddress',
    'as'=>'summaryAddress'
]);

Route::get('product/cart/confirm/{addressID}/{firstName}/{lastName}/{email}/{totalAmount}',[
    'uses'=>'CartController@confirm',
    'as'=>'confirm'
]);

/*
 * User Controller
 * User Section will be done from here
 */
Route::get('photography/user/home',[
    'uses'=>'UserController@home',
    'as'=>'userHome'
]);
Route::get('photography/user/profile',[
    'uses'=>'UserController@profile',
    'as'=>'userProfile'
]);

Route::put('photography/user/profile',[
    'uses'=>'UserController@dp',
    'as'=>'userDP'
]);

Route::put('photography/user/profile/update',[
    'uses'=>'UserController@updateProfile',
    'as'=>'userUpdate'
]);
Route::get('photography/user/profile/{userID}',[
    'uses'=>'UserController@getProfile',
    'as'=>'getUserProfile'
]);

Route::put('photography/user/images',[
    'uses'=>'UserController@userImages',
    'as'=>'userImages'
]);
Route::put('photography/user/review',[
    'uses'=>'UserController@addReview',
    'as'=>'addReview'
]);
<?php

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

Route::get('/', 'PagesController@getHome' );

Route::get('start-shopping', 'PagesController@getProducts' );

Route::get('/product-details', 'PagesController@getProduct' );

Route::get('/details', 'PagesController@getProduct_' );

Route::get('/add-to-cart', 'PagesController@getCart' );

Route::get('/eggs-meat-fish', 'PagesController@getEggsMeatFish' );

Route::get('/branded-food-snacks', 'PagesController@getBrandedFoodSnacks' );

Route::get('/beverages-drinks', 'PagesController@getBeveragesDrinks' );

Route::get('/bakery-cakes-diary', 'PagesController@getBakeryCakesDiary' );

Route::get('/food-grain-oil', 'PagesController@getFoodGrainOil' );

Route::get('/featured-products', 'PagesController@getFeatured' );

Route::get('/fruits-vergetables', 'PagesController@getFruitsVege' );

Route::post('/delete-order', 'PagesController@getDelete' );

Route::post('/update-order', 'PagesController@getUpdate' );

Route::post('/delivery-options', 'AddressController@getDelivery' );

Route::post('/delivery-options-standard', 'AddressController@getDeliveryStandard' );

Route::post('/direct-cart', 'PagesController@directToCart' );

Route::post('search', 'PagesController@getsearch' );

Route::post('/submitt',  'PagesController@addProductInfo');



Route::get('show-order', 'PagesController@showOrder' );

Route::get('my-account', 'PagesController@getMyAccount' );

Route::get('update-account', 'PagesController@getMyAccount' );

Route::get('payment', 'AddressController@getPayment' );

Route::get('credit-card', 'AddressController@getPayment' );

Route::get('on-delivery', 'AddressController@getPayment' );

Route::get('/deliverypayment', 'AddressController@onDeliveryPayment' );

Route::get('storedata', 'PagesController@getUploadProduct' );

Route::get('about-us', 'PagesController@getAboutUs' );

Route::get('projects', 'PagesController@getProjects' );

Route::get('terms-condition', 'PagesController@getProjects' );

Route::get('contact-us', 'PagesController@getContactUs' );

Route::get('view', 'PagesController@next' );

Route::get('empty-busket', 'PagesController@getEmpty' );

Route::get('getAjax', 'PagesController@getAjax');

Route::get('view-product', 'PagesController@getAllProducts' );

Route::get('upload-product', 'PagesController@getProducts' );

Route::get('continue-checkout', 'PagesController@getProducts' );

Route::get('new-address', 'PagesController@getProducts' );

Route::get('validate-order', 'AddressController@registered' );

Route::get('select-address', 'AddressController@direct' );

Route::get('/message', 'AddressController@messages' );

Route::get('delete-address', 'AddressController@delete' );

Auth::routes();

Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::get('/home', 'HomeController@index');

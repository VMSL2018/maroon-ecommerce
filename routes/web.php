<?php
/*
|--------------------------------------------------------------------------
|--- ADMIN Routes
|--------------------------------------------------------------------------
|
|--- Here is where you can register web routes for your application. These
|--- routes are loaded by the RouteServiceProvider within a group which
|--- contains the "web" middleware group. Now create something great!
|
*/

//Route::group(['middleware' => 'auth'], function () {

	Route::get('/admin', 'HomeController@admindashboard')->name('admindashboard');	// Admin Dashboard Controller
	Route::resource('admin/category', 'CategoryController');						// Category Management Routes
	Route::resource('admin/sub_category', 'SubCategoryController');					// SubCategory Management Routes
	Route::resource('admin/sub_slave_category', 'SubSlaveCategoryController');		// SubSlaveCategory Management Routes
	Route::resource('admin/product','ProductsController'); 							// Products
	Route::post('/admin/product/description', 'ProductsController@update_product_description')->name('update_description'); // update product description
	Route::resource('admin/productvariation','ProductVariationController');			// Products Variations
	Route::resource('admin/media','MediaController');  								// Products Media
	Route::resource('admin/slide','SlideController');  								// Slide Show
	Route::resource('admin/orders','OrderController');  							// orders Show
	

//});

/*
|
|--------------------------------------------------------------------------
| Web Routes - CUSTOMER'S Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('newsletter', 'NewsletterController',['except' => 'show']); 

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');
Route::resource('cart', 'CartController',['except' => 'show']); 
Route::get('/cart/{id}','CartController@show')->name('cart-delete');	// customer wishlist


//Route::get('/products', 'ProductsController@productsview')->name('productsview'); // category wise product view
Route::get('/products/{category}', 'ProductsController@productsview')->name('CategoryProductList'); // Main Ctaegory Product Listing
Route::get('/products/{category}/{sub_category}', 'ProductsController@productsview')->name('SubCategoryProductList'); // Main and Sub Category Product Listing
Route::get('/products/{category}/{sub_category}/{sub_slave_category}', 'ProductsController@productsview')->name('SubSlaveCategoryProductList'); // Main, Sub category and Sub-category Slave Product Listing

Route::get('/products/{category}/{id}', 'ProductsController@singleproductview')->name('singleproductview'); // single products view
Route::get('/product/{id}', 'ProductsController@singleproductview')->name('singleproductview'); // single products view


/*
|
|--- Customer need to be signed up for viewing these routes
|
*/
Route::get('/account',	'UserInformationController@account')->name('account')->middleware('auth');		// customer wishlist


Route::get('/wishlist','WishlistController@index')->name('wishlist');	// customer wishlist
Route::post('/wishlist','WishlistController@store')->name('wishlist-store');	// customer wishlist
Route::get('/wishlist/{id}','WishlistController@show')->name('');	// customer wishlist

 
Route::get('/orders',	'UserInformationController@orders')->name('orders')->middleware('auth');		// customer orders


/*
AJAX CONTROLLER
*/
Route::post('/choose_size',	'AjaxController@choose_size')->name('choose_sizes'); // customer orders
Route::post('/check_stock',	'AjaxController@check_stock')->name('check_stock'); // check stock for the desired product
Route::post('/coupon',	'AjaxController@coupon')->name('coupon'); // implement coupon in Cart


/*
|
|
|---------------------------------------------------------------------------------------
| POLICY ROUTES
|---------------------------------------------------------------------------------------
|
|
*/

Route::get('/store',	'SettingController@store_location')->name('store');
Route::get('/about-us',	'SettingController@about_us')->name('about_us');
Route::get('/conditions-of-use',	'SettingController@conditions_of_use')->name('conditions_of_use');
Route::get('/shipping-returns',	'SettingController@shipping_returns')->name('shipping_returns');
Route::get('/privacy-notice',	'SettingController@privacy_notice')->name('privacy_notice');
	

/*
|----------------------------------------------------------------------------------------
| END OF POLICY ROUTES
|----------------------------------------------------------------------------------------
*/



/*
|----------------------------------------------------------------------------------------
|	SOCIAL ROUTE STARTS HERE
|	Social Authentication
|	Google		=>   
|					=>	APP ID : 870249225153-603tab9c07j8b5llqasdsos560hqk9sr.apps.googleusercontent.com
|           		=>	APP SECRET : FkJlTlrIMdED_Ww3P3r2kiVw
|
|	Facebook	=> 
|					=>	App id = 1038683676338844;
|----------------------------------------------------------------------------------------
*/
	Route::get('login/facebook', 'Auth\LoginController@redirectToFacebookProvider');
	Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookProviderCallback');
	
	Route::get('login/google', 'Auth\LoginController@redirectToGoogleProvider');
	Route::get('login/google/callback', 'Auth\LoginController@handleGoogleProviderCallback');
/*
|
|----------------------------------------------------------------------------------------
|	END OF SOCILA ROUTE
|----------------------------------------------------------------------------------------
|
*/


/*
|
|----------------------------------------------------------------------------------------
|	CHECKOUT ROUTES
|----------------------------------------------------------------------------------------
|
|	THIS ROUTES ARE FOR CHECKOUT WHEN CUSTOMER WILL TRY TO PURCHASE THINGS FROM THE 
|	APPLICATIONS
|
*/

Route::get('/checkout',	'Checkout@index')->name('checkout'); 
Route::post('/checkout',	'Checkout@checkoutData')->name('checkoutData'); 
Route::post('/payment',	'Checkout@payment')->name('payment'); 
Route::post('/paymentreturn',	'Checkout@paymentreturn')->name('paymentreturn'); 

Route::get('/invoice/{id}',	'CartController@customer_invoice')->name('customer_invoice'); 

/*
|
|----------------------------------------------------------------------------------------
|	END OF CHECKOUT ROUTES
|----------------------------------------------------------------------------------------
|
*/



/*
|
|---------------------------------------------------------------------------------------------
| TEST ROUTES
|---------------------------------------------------------------------------------------------
|
|	This routes will be used for various testing purposes.
|
*/

Route::get('/phpinfo', function () {
	phpinfo();
});
	
Route::get('/sendsms', function () {

	$user = "vmsl";
	$pass = "t93<2L82"; 
	$sid = "vmsleng"; 
	$mobile="8801534653592";
	$sms = "Hello from Maroon";
	$url="http://sms.sslwireless.com/pushapi/dynamic/server.php"; 
	$param="user=$user&pass=$pass&sms[0][0]= 8801711086451&sms[0][1]=".urlencode("Hello from the other side!!!")."&sid=$sid"; 
	$crl = curl_init(); 
	curl_setopt($crl,CURLOPT_SSL_VERIFYPEER,FALSE); 
	curl_setopt($crl,CURLOPT_SSL_VERIFYHOST,2); 
	curl_setopt($crl,CURLOPT_URL,$url); 
	curl_setopt($crl,CURLOPT_HEADER,0);
	curl_setopt($crl,CURLOPT_RETURNTRANSFER,1);
	curl_setopt($crl,CURLOPT_POST,1); 
	curl_setopt($crl,CURLOPT_POSTFIELDS,$param); 
	$response = curl_exec($crl);
	curl_close($crl); 
	echo $response;
	
	
	
});  // SMS SENDING WORKS



Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');


/*
|
|---------------------------------------------------------------------------------------------
| END OF TEST ROUTES
|---------------------------------------------------------------------------------------------
|
*/
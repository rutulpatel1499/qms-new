<?php
 use App\Listener\SendEmail;
//  use Mail;
  
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
Route::auth();

// Route::group(['middleware' => ['web', 'role']],  function() {
    
//user route
Route::get('admin','UserController@user')->name('user');
Route::get('login','logincontroller@login')->name('login');
Route::post('loginme','logincontroller@userlogin')->name('userlogin');
Route::get('logout','logincontroller@logout')->name('logout');
Route::get('reset', 'ResetPasswordController@reset')->name('reset');
route::resource('users','ViewUserController');
Route::get('dashboard', 'DashboardController@userdashboard')->name('userdashboard');
//user register//
Route::get('register', 'ViewUserController@create')->name('createdata');
Route::post('registers', 'ViewUserController@store')->name('storedata');


//company route

Route::get('companyuser','CompanyUserController@companyusersidebar')->name('CompanySidebar');//->middleware('auth:user');
Route::get('compapanyuserdashboard','CompanyDashboardController@companydashboard')->name('compapanydashboard');

//categories//
Route::resource('companycategories','CompanyCategoriesController');
//->Middleware(['can:isAdmin']);
//brand//
Route::resource('companybrands','CompanyBrandController'); 
//->Middleware('can:isAdmin');
//client//
Route::resource('companyclients','CompanyClientController');
//product //
Route::resource('companyproducts','CompanyProductController');
//productspecification //
Route::resource('productspecification','CompanyProductspecificationController');
// quatation //
Route::resource('companyquatation','CompanyQuatationController');
//quatation items //
Route::resource('companyquatationitem','CompanyQuatationItemsController');
// ajax get product //
Route::get('get-product/{id}','CompanyQuatationController@getAllProducts')->name('getAllProducts');
//view file in product table create route
// });
Route::get('pdf/{id}','CreatePdfController@pdfGenrate')->name('pdfGenrate');
//pdf genrate route
Route::post('get-brand','CompanyBrandController@newbrand')->name('newbrand');
//do not replace value
Route::post('get-category','CompanyCategoriesController@category')->name('category');
//do not replace value
Route::get('check-qty','CompanyQuatationController@checkqty')->name('checkqty');
//old qty lessthan new qty value route
Route::get('event','CompanyUserController@index')->name('index');
//send email via event 
Route::get('sendemail','CompanyUserController@sendmail')->name('sendmail');
//queue and jobs route
Route::resource('form','FormContoller');
//form examples
// Route::get('google', 'Auth\LoginController@redirectToProvider');
// Route::get('googlecall', 'Auth\LoginController@handleProviderCallback');
Route::get('google', 'GoogleController@redirectToGoogle');
Route::get('googlecallback', 'GoogleController@handleGoogleCallback')->name('handleGoogleCallback');
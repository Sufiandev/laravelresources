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

Route::get('/','HomeController@index');
Route::get('/home','HomeController@index');
Route::get('pages/{slug}','HomeController@pages');
Route::post('/contact','HomeController@contact_form_submit')->name('contact.form.submit');
Route::get('/projects','HomeController@projects');
Route::get('/projects/{id}','HomeController@projects_view');
Route::get('/products','HomeController@products');
Route::get('/products/{id}','HomeController@products_view');
Route::get('/career','HomeController@career');
Route::get('/apply','HomeController@show_apply_form')->name('career.apply');
Route::post('/apply','HomeController@apply')->name('apply.submit');
Route::get('/blog','HomeController@blog');
Route::get('/blog/{id}','HomeController@blog_view');
Route::get('/contact','HomeController@contact');
Auth::routes();
// Route::view('/home', 'home')->middleware('auth');

Route::get('/download/product/{id}','HomeController@product_download')->name('download.product');


// ADMIN Routes
Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm')->name('admin.login');
Route::post('/login/admin', 'Auth\LoginController@adminLogin')->name('admin.login.submit');
Route::post('/logout/admin', 'Admin\AdminController@logout')->name('admin.logout');


Route::group(['prefix' => 'admin','middleware'=>'auth:admin'], function() {
    Route::get('/','Admin\AdminController@index');
    Route::resource('/cmsuser','Admin\CmsUser')->except(['create']);
    Route::resource('/categories','Admin\Categories')->except(['create']);
    Route::resource('/menu','Admin\MenuController')->except(['create']);
    Route::resource('/blog','Admin\BlogController')->except(['create']);
    Route::resource('/slider','Admin\SliderController')->except(['create']);
    Route::resource('/settings','Admin\SettingsController')->only(['index','update']);
    
    
    Route::resource('/projects','Admin\Resources\ProjectController')->except(['create']);
    Route::resource('/products','Admin\Resources\ProductsController')->except(['create']);
    Route::resource('/career','Admin\Resources\CareerController')->except(['create']);
    Route::resource('/patners','Admin\Resources\PatnersController')->except(['create']);
    Route::resource('/applications','Admin\Resources\ApplicationsController')->only(['index','destroy']);
    Route::get('/applications/file/{id}','Admin\Resources\ApplicationsController@downloadApplication');

    // Route::post('/saveSimple','Admin\FunctionController@saveSimple')->name('admin.saveSimple');
});

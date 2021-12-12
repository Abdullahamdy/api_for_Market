<?php
use Illuminate\Support\Facades\Route;

use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route as FacadesRoute;


Route::group(['middleware' => ['guest:admin']], function () {
    Route::get('/login', 'AuthController@viewLogin')->name('admin.login');
    Route::post('/login', 'AuthController@login');
});
Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/', 'HomeController@index');

    Route::get('home', 'HomeController@index')->name('adminlogout');

    Route::get('home', 'HomeController@index')->name('admin.home');
    Route::post('admin-logout', 'AuthController@adminLogout')->name('admin.logout');
    Route::get('settings', 'SettingController@view');
    Route::post('settings', 'SettingController@update');
    Route::resource('developer/settings/categories', 'SettingCategoryController');
    Route::resource('users', 'UserController');
    Route::get('users/toggle-boolean/{id}/{action}', 'UserController@toggleBoolean')->name('facilities.users.toggleBoolean');
    Route::resource('roles', 'RoleController');
    // Route::resource('logs', 'LogController')->only('index');


    Route::resource('product', 'ProductController');
    Route::resource('store', 'StoreController');
    Route::resource('contact-us', 'ContactusController');
    Route::resource('clients', 'ClientController');
    Route::resource('category', 'CategoriesController');
    Route::get('clients/toggle-boolean/{id}/{action}', 'ClientController@toggleBoolean')->name('facilities.users.toggleBoolean');


});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix'=>'v1','namespace'=>'ApiController'],function(){
Route::post('login', 'AuthController@login');
Route::post('register','AuthController@register');
Route::post('forget-password','AuthController@forgetPassword');
Route::group(['middleware' =>'auth:api'],function(){
    Route::get('client-product','MainController@index');
    Route::get('get-products','MainController@getProducts');
    Route::post('is-favourite','MainController@isFavouirte');
   Route::post('SortPopularity','MainController@SortPopularity');
   Route::get('SortPriceDesc','MainController@SortPriceDesc');
   Route::get('SortPriceAsc','MainController@SortPriceAsc');
   Route::get('SortNormal','MainController@SortNormal');
   Route::post('Report-aproblem','MainController@ReportProblem');
   Route::post('request-status','MainController@RequestStatus');
   Route::post('update-Profile','AuthController@updateProfile');
   Route::post('change-email','AuthController@updateEmail');
   Route::post('change-password','AuthController@updatePassword');
   Route::get('map-address','MainController@MapsAddress');
   Route::post('shopping-basket','MainController@shoppingBasket');
Route::post('destance','MainController@searchGroup');







});



});

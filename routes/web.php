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
Route::get('/', function () {
    return view('login');
//    return view('master.master');
});

Route::get('login', 'DonorController@login');
Route::get('logout', 'DonorController@logout');

Route::post('dashboard', 'DonorController@logincheck');

Route::any('home', 'DonorController@dashboard');


Route::group(['middleware' => 'usersession'], function ()
{
    Route::any('donate', 'DonorController@donate');
    Route::any('donors', 'DonorController@list1');
    Route::any('print/{id}', 'DonorController@donation_receipt');
    Route::any('selectCity', 'DonorController@selectCity');
    Route::any('donation', 'DonorController@donor');

    //----------------------- Payment -----------------------
    Route::any('payment', 'PaymentController@payment');
});
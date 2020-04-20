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



Route::group(['namespace' => 'Auth'] , function(){

    Route::get('/',  "LoginController@show")->name('login.show');
    Route::post('/login' , "LoginController@login")->name('login.login');
    Route::post('/logout', 'LoginController@logout')->name('login.logout');
    Route::get('/registrar' ,"RegisterController@show")->name('register.show');
    Route::post('/registrar' , "RegisterController@storage")->name('register.storage');
    
    //Providers Routes
    Route::get('/login/facebook','LoginController@redirectToFacebook')->name("login.facebook");
    Route::get('/login/facebook/callback' , 'LoginController@handleFacebookCallback');
    Route::get('/login/google','LoginController@redirectToGoogle')->name("login.google");
    Route::get('/login/google/callback' , 'LoginController@handleGoogleCallback');

});

//DsahBoard Routes
Route::get('/dashboard/{token}' ,"DashboardController@show")->name('dashboard.show');








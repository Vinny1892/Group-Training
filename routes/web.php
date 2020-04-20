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
    Route::get('/registrar' ,"RegisterController@show")->name('register.show');
    Route::post('/registrar' , "RegisterController@storage")->name('register.storage');
    
    //Providers Routes
    Route::get('/login/facebook','LoginController@redirectToFacebook');
    Route::get('/login/facebook/callback' , 'LoginController@handleFacebookCallback');
    Route::get('/login/google','LoginController@redirectToGoogle');
    Route::get('/login/google/callback' , 'LoginController@handleGoogleCallback');

        
});








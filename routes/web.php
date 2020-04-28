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

    Route::get('/login',  "LoginController@show")->name('login');
    Route::post('/login' , "LoginController@login")->name('login.login');
    Route::post('/logout', 'LoginController@logout')->name('login.logout');
    Route::get('/registrar' ,"RegisterController@show")->name('register');
    Route::post('/registrar' , "RegisterController@storage")->name('register.storage');
    
    //Providers Routes
    Route::get('/login/facebook','LoginController@redirectToFacebook')->name("login.facebook");
    Route::get('/login/facebook/callback' , 'LoginController@handleFacebookCallback');
    Route::get('/login/google','LoginController@redirectToGoogle')->name("login.google");
    Route::get('/login/google/callback' , 'LoginController@handleGoogleCallback');

});

//DsahBoard Routes
Route::get('/dashboard' ,"DashboardController@show")->name('dashboard');

Route::get('/' ,"HomePageController@show")->name('homepage');

Route::get('/listaSalas' ,"SalaController@show")->name('listasalas');

Route::group(['namespace' => 'Chat'],function(){
    Route::get('/chat' , 'ChatController@show')->name('chat');
});





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
    Route::get('/logout', 'LoginController@logout')->name('login.logout');
    Route::get('/registrar/' ,"RegisterController@show")->name('register');
    Route::post('/registrar' , "RegisterController@storage")->name('register.storage');

    //Providers Routes
    Route::get('/login/facebook','LoginController@redirectToFacebook')->name("login.facebook");
    Route::get('/login/facebook/callback' , 'LoginController@handleFacebookCallback');
    Route::get('/login/google','LoginController@redirectToGoogle')->name("login.google");
    Route::get('/login/google/callback' , 'LoginController@handleGoogleCallback');
});

Route::get('/teste' ,function(){
    response('Funcionou teste');
})->middleware('role.admin');

//DsahBoard Routes
Route::get('/' ,"HomePageController@show")->name('home');
Route::get('/modalidades' ,"ModalityController@show")->name('modalidades');
Route::get('/painel' ,"DashboardController@show")->name('painel');
Route::get('/chat' , 'RoomController@show')->name('chat');
Route::get('/salas' , "RoomController@allRoom")->name('salas');
Route::get('/mysalas' , "RoomController@myRoom")->name('mysalas');

////Exemplo de rota com parâmetro opcional.
//Route::get('welcome/{name?}', function ($name = 'visitante') {
//    return "Seja bem vindo $name!";
//});
//Route::get('welcome/{name}', function ($name) {
//    //
//})->where('name', '[A-Za-z]+');
//// o Eloquent disponibiliza uma serie de métodos além do all(),
////https://laravel.com/docs/5.4/eloquent
//Route::get('posts', function () {
//    // Corresponde a "SELECT * FROM post"
//    return Post::all();
//});
//
//




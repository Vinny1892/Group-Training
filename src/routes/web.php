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
/**
 * index – Lista os dados da tabela
 * show – Mostra um item específico
 * create – Retorna a View para criar um item da tabela
 * store – Salva o novo item na tabela
 * edit – Retorna a View para edição do dado
 * update – Salva a atualização do dado
 * destroy – Remove o dado
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

//DashBoard - painel de gerenciamento
Route::get('/painel' ,"DashboardController@show")->name('painel');


//MODALIDADE
//Route::get('/modalidade/{modality}' , "ModalityController@show")->name('modalidade');
Route::get('/modalidades' ,"ModalityController@index")->name('modalidades');
Route::get('/modalidade/atualizar/{modality}' , "ModalityController@update")->name('atualizarmodalidade');
Route::get('/modalidade/excluir/{modality}' , "ModalityController@destroy")->name('excluirmodalidade');
Route::post('/modalidade/salvar' , "ModalityController@store")->name('savemodality');
Route::get('/modalidade/teste', function(){
        return view("modality/teste");
    });
Route::post('/modalidade/editar', "ModalityController@edit")->name('editemodalidade');
Route::get('/modalidade/criar', "ModalityController@create")->name('create.modalidade');

//SALAS
Route::get('/chat' , 'RoomController@show')->name('chat');
Route::get('/salas' , "RoomController@allRoom")->name('salas');
Route::get('/mysalas' , "RoomController@myRoom")->name('mysalas');
Route::get('/tags' , "RoomController@index")->name('tags');
Route::get('/sala/{tag}' , "RoomController@tags")->name('salatags');


//TAG
Route::get('/tags' , "TagController@index")->name('tags');

Route::get('/teste' ,function(){
    response('Funcionou teste');
})->middleware('role.admin');

//DsahBoard Routes
    Route::get("dashboard/{slugName}/edit" , "DashboardController@editUser")->name('dashboard.edit');
    Route::get('dashboard' ,"DashboardController@show")->name('dashboard');




//Route::group(['namespace' => 'Room'],function(){
    Route::get('/chat' , 'RoomController@show')->name('chat');
    Route::get('/listameuschats' , "RoomController@minhaLista")->name('listameuschats');
//});

//HOME PAGE
Route::get('/' ,"HomePageController@show")->name('home');


//CATEGORIA

Route::get('/dashboard/categoria/criar' , "CategoryController@create")->name('category');
Route::post('/dashboard/categoria', 'CategoryController@store')->name('category.store');



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




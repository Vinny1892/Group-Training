<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServicePdashbrovider within a group which
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
    Route::put('dashboard/user/{user}/editar', "RegisterController@update")->name('user.update');
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
//Route::get('/modalidade' , "ModalityController@show")->name('modalidade');
Route::get('/modalidade/{slug}/atualizar' , "ModalityController@edit")->name('modality.edit');
//Route::get('/modalidade/editar', "ModalityController@edit" )->name('editemodalidade');
Route::post('/modalidade/salvar', "ModalityController@store")->name('savemodality');
Route::get('/modalidade/criar', "ModalityController@create")->name('create.modalidade');
Route::get('/painel/modalidade/{slug}/excluir' ,"ModalityController@destroy")->name('modality.delete');
Route::get('/painel/modalidade' ,"ModalityController@index")->name('modalidade');

                    //SALAS
Route::get('/sala/{slug}/chat', 'RoomController@show')->name('chat');
Route::get('/modalidade/{slugModality}/salas' , "RoomController@roomsOfModality")->name('salas');
//Route::get('/minhassalas' , "RoomController@myRoom")->name('mysalas');
//Route::get('/tags' , "RoomController@index")->name('tags');
Route::get('/painel/sala', "RoomController@index")->name('sala');/*lista sala na dashboard*/
Route::get('/painel/sala/criar', "RoomController@create")->name('createroom');
Route::post('/painel/sala/salvar', "RoomController@store")->name('saveroom');
Route::get('/painel/sala/{slug}/editar', "RoomController@edit")->name('editroom');
Route::post('/painel/sala/atualizar' , "RoomController@update")->name('updateroom');
Route::get('/painel/sala/{slug}/deletar', "RoomController@destroy")->name('deleteroom');

                    //TAG
//Route::get('/tags', "TagController@index")->name('tags');
Route::get('/painel/tag/criar', "TagController@create")->name('tag');

Route::get('/teste', function(){
    response('Funcionou teste');
})->middleware('role.admin');

//DashBoard Routes
    Route::get("dashboard/{slugName}/edit" , "DashboardController@editUser")->name('user.edit');
    Route::get('dashboard' ,"DashboardController@show")->name('dashboard');


                    //HOME PAGE
Route::get('/', "HomePageController@show")->name('home');

                    //CATEGORIA
Route::get('/dashboard/categoria/criar', "CategoryController@create")->name('category');
Route::get('/dashboard/categoria/{slugCategory}/editar', "CategoryController@edit")->name('category.edit');
Route::put('dashboard/categoria/{category}/editar', "CategoryController@update")->name('category.update');
Route::get('dashboard/categoria/{slugCategory}/delete',"CategoryController@destroy")->name('category.delete');
Route::post('/dashboard/categoria', 'CategoryController@store')->name('category.store');

//TAG


Route::get('/dashboard/tag/criar', "TagController@show")->name('tag');
Route::get('dashboard/tag/{slugTag}/editar',  "TagController@edit")->name('tag.edit');
Route::post('/dashboard/tag/criar', "TagController@store")->name('tag.store');
Route::put('dashbpard/tag/{tag}/editar',"TagController@update")->name('tag.update');
Route::get('dashboard/tag/{slugTag}/delete',"TagController@destroy")->name('tag.delete');



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




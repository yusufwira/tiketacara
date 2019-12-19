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



Auth::routes();
// Route::get('logout', 'LoginController@logout')->name('logout');
Route::get('/', 'MemberController@index')->name('index');
Route::get('/profile', 'MemberController@inputprofile')->name('profile');



Route::get('/home', 'HomeController@index')->name('home');
Route::get('/inputprofile', 'MemberController@inputprofile')->name('inputprofile');
Route::get('/listevent', 'MemberController@listEvent')->name('listevent');
Route::get('/listnews', 'MemberController@listNews')->name('listnews');
Route::get('/detailevent/{id}', 'MemberController@detailevent')->name('detailevent');
Route::get('/detailnews/{id}', 'MemberController@detailnews')->name('detailnews');
Route::get('/keranjang', 'MemberController@keranjang')->name('keranjang');

Route::resource('event','EventController');
Route::resource('news','NewsController');
Route::resource('profiles','ProfileController');
Route::resource('orders','EventMembersController');
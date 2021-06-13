<?php

use Illuminate\Support\Facades\Route;

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

 /*Route::get('home', function () {
    return view('home');
 });
 */
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

Route::get('/about-me', function () {
    return view('about');
});

Route::view('/about-me','about');

Route::view('/contact-me','contact');

Route::get('/post/trash','PostController@trashedPosts')->name('post.trash');

Route::resource('/post','PostController');

Route::get('/post/soft/delete/{id}','PostController@softDelete')->name('soft.delete');

Route::get('/post/back/from/trash/{id}','PostController@backFromSoftDelete')->name('back.from.trash');

Route::get('/post/delete/from/database/{id}','PostController@deleteForver')->name('delete.from.database');







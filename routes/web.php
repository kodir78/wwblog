<?php
use RealRashid\SweetAlert\Facades\Alert;

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

// Route Bagian Front end
Route::get('/', [
     'uses' => 'BlogController@index',
     'as' => 'blog'
     ]);
Route::get('/all', [
    'uses' => 'BlogController@allposts',
    'as' => 'all'
    ]);
Route::get('/blog/{post}', [
    'uses' => 'BlogController@show',
    'as' => 'blog.show'
    ]);
Route::get('/category/{category}', [
        'uses' => 'BlogController@category',
        'as' => 'category'
    ]);
Route::get('/author/{author}', [
    'uses' => 'BlogController@author',
    'as' => 'author'
    ]);
Route::get('/search', [
    'uses' => 'BlogController@search',
    'as' => 'blog.search'
    ]);
// End Route Bagian Frontend

//Route::get('/search','BlogController@search')->name('blog.search');
// Route::get('/blog/{slug}', 'BlogController@show')->name('blog.show');
//Route::get('/backend/posts/{post}/restore', 'Backend\PostController@restore')->name('posts.restore');

// Route Bagian Backend
//Auth::routes();
// Menonaktifkan user register
Auth::routes([
    'register' => false,
]);
Route::group(['middleware' => 'auth'], function()
{
    Route::get('/home', 'Backend\HomeController@index')->name('home');
    Route::get('/edit-account', 'Backend\HomeController@edit');
    Route::put('/edit-account', 'Backend\HomeController@update');
   
    Route::get('/backend/posts/{post}/restore', [
        'uses' => 'Backend\PostController@restore',
        'as' => 'posts.restore'
        ]);
    Route::delete('/backend/posts/{post}/forceDestroy', 'Backend\PostController@forceDestroy')->name('posts.forceDestroy');
    Route::resource('/backend/posts', 'Backend\PostController');

    Route::resource('/backend/categories', 'Backend\CategoryController');
    Route::get('/backend/users/{user}/confirm/', [
        'uses' => 'Backend\UserController@confirm',
        'as' => 'users.confirm'
    ]);
    Route::resource('/backend/users', 'Backend\UserController');
    Route::get('/backend/posts/trash', 'Backend\PostController@trash')->name('posts.trash');
    //Route::resource('/backend/tags', 'Backend\TagsController');
    // Route::resource('/backend/pegawai', 'Backend\PegawaiController');
    // Route::resource('/backend/sliders', 'Backend\SliderController');
});
// End Route Bagian Backend    
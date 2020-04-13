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

//Route::get('/search','BlogController@search')->name('blog.search');
  
// Route::get('/blog/{slug}', 'BlogController@show')->name('blog.show');

//Auth::routes();
// Menonaktifkan user register
Auth::routes([
    'register' => false,
]);
Route::get('/home', 'Backend\HomeController@index')->name('home');

//Route::get('/backend/posts/{post}/restore', 'Backend\PostController@restore')->name('posts.restore');
  
Route::get('/backend/posts/{post}/restore', [
    'uses' => 'Backend\PostController@restore',
    'as' => 'posts.restore'
    ]);

Route::delete('/backend/posts/{post}/kill', 'Backend\PostController@kill')->name('posts.kill');

// Route::delete('/backend/posts/{post}/kill', [ 
//     'use' => 'Backend\PostController@forcedestroy',
//     'as'=>'posts.forcedestroy'
// ]);
 

Route::resource('/backend/posts', 'Backend\PostController');


// Route::group(['middleware' => 'auth'], function()
// {});
    
    

    Route::resource('/users', 'UserController');
    Route::resource('/backend/categories', 'Backend\CategoryController');
    Route::resource('/backend/tags', 'Backend\TagsController');
    Route::get('/backend/posts/trash', 'Backend\PostController@trash')->name('posts.trash');
    
    
    // Route::resource('/posts', 'PostController');
    Route::resource('/backend/pegawai', 'Backend\PegawaiController');
    Route::resource('/backend/sliders', 'Backend\SliderController');





//Route::get('/dashboard', 'HomeController@index')->name('dashboard');

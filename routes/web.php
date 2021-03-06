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

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::redirect('/home', '/admin');
Route::redirect('/', '/admin')->name('home');

Route::prefix('/admin')->namespace('Admin')->middleware('auth')->group(function () {
    Route::view('/', 'admin.dashboard');
    Route::view('/sandbox', 'admin.sandbox');
    Route::get('/edit-account', '\Maelstrom\Http\Controllers\EditAccountController')->name('maelstrom.edit-account');
    Route::put('/edit-account', '\Maelstrom\Http\Controllers\EditAccountController@update');

    Route::resource('/tags', 'TagController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/posts', 'PostController');
    Route::resource('/authors', 'AuthorController');
    Route::resource('/galleries', 'GalleryController');

    Route::post('/bulk-actions/tags', 'BulkActionsController')->name('tags.bulk');
    Route::post('/bulk-actions/categories', 'BulkActionsController')->name('categories.bulk');
    Route::post('/bulk-actions/posts', 'BulkActionsController')->name('posts.bulk');
    Route::post('/bulk-actions/authors', 'BulkActionsController')->name('authors.bulk');
});

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

Route::redirect('/', '/admin')->name('home');

Route::prefix('/admin')->middleware('auth')->group(function () {
    Route::view('/', 'admin.dashboard');
    Route::get('/edit-account', '\Maelstrom\Http\Controllers\EditAccountController')->name('maelstrom.edit-account');
    Route::put('/edit-account', '\Maelstrom\Http\Controllers\EditAccountController@update');

    Route::resource('/tags', 'Admin\TagController');
    Route::resource('/categories', 'Admin\CategoryController');
});

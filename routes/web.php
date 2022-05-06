<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});
// Layouts
Route::view('demo', 'layouts.main');

Route::prefix('users')
    ->controller(UserController::class)
    ->group(function () {
        Route::get('', 'index')->name('users.index');

        Route::get('users/add', 'create')->name('users.add');
        Route::post('users/add', 'store')->name('users.saveAdd');

        Route::get('users/edit/{id}', 'edit')->name('users.edit');
        Route::post('users/edit/{id}', 'update')->name('users.saveEdit');

        Route::delete('users/remove/{id}', 'destroy')->name('users.remove');

        Route::get('users/show/{id}', 'show')->name('users.show');
    });


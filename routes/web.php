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

//CRUD
//Route::resource('users', 'App\Http\Controllers\UserController');

Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/add', [UserController::class, 'create'])->name('users.add');
Route::post('users/add', [UserController::class, 'store'])->name('users.saveAdd');

Route::delete('users/remove/{id}', [UserController::class, 'destroy'])->name('users.remove');

Route::get('users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
Route::post('users/edit/{id}', [UserController::class, 'update'])->name('users.saveEdit');

Route::get('users/show/{id}', [UserController::class, 'show'])->name('users.show');

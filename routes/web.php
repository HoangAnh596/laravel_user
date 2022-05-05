<?php

use App\Http\Controllers\LoginController;
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
Route::get('users', [LoginController::class, 'index'])->name('users.index');


Route::get('users/add', [LoginController::class, 'create'])->name('users.add');
Route::post('users/add', [LoginController::class, 'store'])->name('users.saveAdd');

Route::post('users/remove/{id}', [LoginController::class, 'destroy'])->name('users.remove');

Route::get('users/edit/{id}', [LoginController::class, 'edit'])->name('users.edit');
Route::post('users/edit/{id}', [LoginController::class, 'update'])->name('users.saveEdit');

Route::get('users/show/{id}', [LoginController::class, 'show'])->name('users.show');

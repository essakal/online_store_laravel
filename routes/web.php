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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/admin/categories', function () {
    return view('admin.categories');
})->middleware(['auth', 'verified'])->name('admin.categories');

Route::get('/admin/products', function () {
    return view('admin.products');
})->middleware(['auth', 'verified'])->name('admin.products');

Route::get('/admin/users', function () {
    return view('admin.users');
})->middleware(['auth', 'verified'])->name('admin.users');

// Route::get('/users', function () {
//     return view('welcome');
// })->name('users');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/auth.php';
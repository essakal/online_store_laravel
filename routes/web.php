<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\client\ProduitController;
use App\Http\Controllers\guest\ProduitguestController;
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
    // return view('welcome');
    return ('welcome');
})->name('welcome');

// Route::get('/client/produit', function () {
//     return view('client.produit');
// })->name('test');

// Route::get('/admin/categories', function () {
//     return view('admin.categories');
// })->middleware(['auth', 'verified'])->name('admin.categories');

Route::group(["prefix" => "admin", "middleware" => ["auth", "verified"]], function () {
    Route::get('/categories/index', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::post('/categories/store', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/delete/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.delete');
    Route::get('/categories/edit/{id}', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::post('/categories/update/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
});

Route::group(["prefix" => "admin", "middleware" => ["auth", "verified"]], function () {
    Route::get('/products/index', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products/store', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/delete/{id}', [ProductController::class, 'destroy'])->name('admin.products.delete');
    Route::get('/products/edit/{id}', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('/products/update/{id}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::get('/users-export', [ProductController::class, 'export'])->name('users.export');
    Route::post('/users-import', [ProductController::class, 'import'])->name('users.import');
});

Route::group(["prefix" => "admin", "middleware" => ["auth", "verified"]], function () {
    Route::get('/users/index', [UserController::class, 'index'])->name('admin.users.index');
    // Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    // Route::post('/products/store', [ProductController::class, 'store'])->name('admin.products.store');
    // Route::get('/products/delete/{id}', [ProductController::class, 'destroy'])->name('admin.products.delete');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::post('/users/update/{id}', [UserController::class, 'update'])->name('admin.users.update');
    // Route::get('/users-export', [ProductController::class, 'export'])->name('users.export');
    // Route::post('/users-import', [ProductController::class, 'import'])->name('users.import');
});

Route::group(["prefix" => "client", "middleware" => ["auth", "verified"]], function () {
    Route::get('/produit/index', [ProduitController::class, 'index'])->name('client.produit.index');
    Route::get('/produit/show/{id}', [ProduitController::class, 'show'])->name('client.produit.show');
});

Route::group(["prefix" => "guest"], function () {
    Route::get('/produit/index', [ProduitguestController::class, 'index'])->name('guest.produit.index');
    Route::get('/produit/show/{id}', [ProduitguestController::class, 'show'])->name('guest.produit.show');
    Route::get('/produit/cart/{id}', [ProduitguestController::class, 'cart'])->name('guest.produit.cart');
    Route::get('/produit/category/{id}', [ProduitguestController::class, 'category'])->name('guest.produit.category');
    Route::get('/produit/search', [ProduitguestController::class, 'search'])->name('guest.produit.search');
    Route::get('/produit/filter', [ProduitguestController::class, 'filter'])->name('guest.produit.filter');
    Route::get('/produit/shopping', [ProduitguestController::class, 'shopping'])->name('guest.produit.shopping');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/auth.php';
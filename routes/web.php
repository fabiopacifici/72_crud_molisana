<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guest\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Guest\ProductController as GuestProductController;

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

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');

// Guest routes
Route::get('products', [GuestProductController::class, 'index'])->name('guest.products.index');
Route::get('products/{product}', [GuestProductController::class, 'show'])->name('guest.products.show');


/* Route::get('/products', function () {
    return 'Products';
})->name('products'); */
/* Rotter per un crud completo lato - backoffice */
Route::resource('admin/products', ProductController::class);
// Rotter resource per esteso
/* Route::get('products', [ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products', [ProductController::class, 'store'])->name('products.store');
Route::get('products/{product}', [ProductController::class, 'show'])->name('products.show');
Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy'); */




/* TODO: secondo giro crud */
Route::get('admin/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('admin/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('admin/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('admin/posts/{post}', [PostController::class, 'show'])->name('posts.show');



// Rotta per ospite sito
Route::get('/news', function () {
    return 'News';
})->name('news');

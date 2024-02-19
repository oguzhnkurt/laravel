<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->middleware('auth')->group(function(){
    
    Route::get('/test', [TestController::class, 'test'])->name('test');
    Route::get('/detail',[TestController::class, 'detail'])->name('detail');

    Route::get('/kitaplar',[BookController::class, 'index'])->name('books.index');
    Route::get('/kitaplar/ekle',[BookController::class, 'create'])->name('books.create');
    Route::post('/kitaplar/ekle',[BookController::class, 'store'])->name('books.store');
    Route::get('/kitaplar/{book}',[BookController::class, 'edit'])->name('books.edit');
    Route::post('/kitaplar/{book}',[BookController::class, 'update'])->name('books.update');
    Route::get('/kitaplar/sil/{book}',[BookController::class, 'delete'])->name('books.delete');


});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dil-degistir', [App\Http\Controllers\HomeController::class, 'changelocale'])->name('changelocale');


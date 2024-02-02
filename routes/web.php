<?php

use App\Http\Controllers\BookController;
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
    Route::get('/kitaplar/{id}',[BookController::class, 'edit'])->name('books.edit');
    Route::post('/kitaplar/{id}',[BookController::class, 'update'])->name('books.update');
    Route::get('/kitaplar/sil/{id}',[BookController::class, 'delete'])->name('books.delete');


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


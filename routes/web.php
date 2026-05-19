<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
Route::resource('categories', CategoryController::class);
Route::resource('products', ProductController::class);

});

Route::get('/dashboard', function () {
    return redirect('/products');
})->middleware(['auth'])->name('dashboard');


require __DIR__.'/auth.php';

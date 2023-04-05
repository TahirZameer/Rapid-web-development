<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/services', function () {
    return view('services');
});

// Route::get('/contact', function () {
//     return view('contact');
// });


// Route::get('/about', [ContactController::class, 'function'])->name('function');
// Route::get('/services', [ContactController::class, 'index'])->name('index');


Route::get('/list', [ContactController::class, 'index'])->name('index');
Route::post('/contact', [ContactController::class, 'store'])->name('store');

Route::get('/contact', [ContactController::class, 'create'])->name('create');

Route::get('/{contact}/edit', [ContactController::class, 'edit'])->name('edit');
Route::put('/{contact}/edit', [ContactController::class, 'update'])->name('update');

Route::delete('/{contact}/edit', [ContactController::class, 'destroy'])->name('destroy');







// route::get('/demo',function(){
//     echo "Hello world!!!";
// });

// Route::get('/{name?}', function ($name = null) {
//     $data = compact ('name');
//     return view('index')->with($data);
// });






















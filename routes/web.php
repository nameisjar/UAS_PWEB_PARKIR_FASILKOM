<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('login');
});

Route::post('/login', [App\Http\Controllers\AkunController::class,'login']) ->name('login');
Route::get('/logout', [App\Http\Controllers\AkunController::class,'logout']) ->name('logout');

Route::middleware(['auth:admin'])->group(function () {
   

    Route::get('/parkir', [App\Http\Controllers\ParkirController::class,'showTambahParkir']) ->name('showTambahParkir');
    Route::post('/parkir', [App\Http\Controllers\ParkirController::class,'tambahParkir']) ->name('tambahParkir');
    
    Route::get('/get-sisa-parkir', [App\Http\Controllers\ParkirController::class,'getSisaParkir'])->name('getSisaParkir');
    
    
    Route::get('/hapusParkir/{id}', [App\Http\Controllers\ParkirController::class,'hapusParkir'])->name('hapusParkir');

});





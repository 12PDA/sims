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

Route::get('/login', [App\Http\Controllers\UserController::class, 'login']);
Route::post('/login/proses_login', [App\Http\Controllers\UserController::class, 'loginPost']);
Route::get('/logout', [App\Http\Controllers\UserController::class, 'logout']);

Route::get('/', [App\Http\Controllers\ProdukController::class, 'index']);
Route::get('/tambah_produk', [App\Http\Controllers\ProdukController::class, 'add']);
Route::post('/produk/proses_tambah', [App\Http\Controllers\ProdukController::class, 'proses_tambah']);
Route::get('/produk/edit/{id}', [App\Http\Controllers\ProdukController::class, 'edit']);
Route::post('/produk/proses_update/{id}', [App\Http\Controllers\ProdukController::class, 'proses_update']);
Route::get('/produk/hapus/{id}', [App\Http\Controllers\ProdukController::class, 'hapus']);

Route::get('/profil', [App\Http\Controllers\ProfilController::class, 'index']);

Route::get('/search', [App\Http\Controllers\ProdukController::class, 'search'])->name('search');

Route::post('/produk/export_excel', [App\Http\Controllers\ProdukController::class, 'export_excel']);

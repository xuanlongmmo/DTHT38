<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RelicsController;
// use App\Http\Controllers\Admin\RelicsController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    Route::resource('relics', RelicsController::class);
    Route::post('relics/loaddistrict', [RelicsController::class, 'loaddistrict'])->name('relics.loaddistrict');
    Route::post('relics/loadward', [RelicsController::class, 'loadward'])->name('relics.loadward');
});
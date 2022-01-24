<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\RelicsController;
// use App\Http\Controllers\Admin\RelicsController;

use App\Models\Artifact;
use App\Models\User;
use App\Models\Province;

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

Route::get('/ok', function () {
    $users = Artifact::find(1)->user;

    dd(Artifact::find(1)->user->id);
    foreach ($users as $user) {
        echo $user;
    }
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth'])->prefix('admin')->group(function () {

    
    Route::group(['prefix' => 'relics'], function() {
        Route::get('/', [RelicsController::class, 'index'])->name('relics.index');

        Route::get('/create', [RelicsController::class, 'create'])->name('relics.create');
        Route::post('/create', [RelicsController::class, 'store'])->name('relics.store');

        Route::get('/edit/{id}', [RelicsController::class, 'edit'])->name('relics.edit');
        Route::post('/update/{id}', [RelicsController::class, 'update'])->name('relics.update');

        Route::post('/delete/{id}', [RelicsController::class, 'destroy'])->name('relics.destroy');

        Route::post('loaddistrict', [RelicsController::class, 'loaddistrict'])->name('relics.loaddistrict');
        Route::post('loadward', [RelicsController::class, 'loadward'])->name('relics.loadward');
    });
    
});
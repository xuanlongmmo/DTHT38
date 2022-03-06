<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RelicsController;
use App\Http\Controllers\Admin\ArtifactsController;
use App\Http\Controllers\Admin\CharactersController;
use App\Http\Controllers\Admin\FestivalsController;

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

Route::get('/', [App\Http\Controllers\Frontend\RelicsController::class, 'index'])->name('fe.relics.index');
Route::get('/di-tich/{slug}', [App\Http\Controllers\Frontend\RelicsController::class, 'detail'])->name('fe.relics.detail');

Route::group(['prefix' => 'le-hoi'], function() {
    Route::get('/', [App\Http\Controllers\Frontend\FestivalsController::class, 'index'])->name('fe.festivals.index');
    Route::get('/{slug}', [App\Http\Controllers\Frontend\FestivalsController::class, 'index'])->name('fe.festivals.detail');
});

Route::group(['prefix' => 'hien-vat'], function() {
    Route::get('/', [App\Http\Controllers\Frontend\FestivalsController::class, 'index'])->name('fe.artifacts.index');
    Route::get('/{slug}', [App\Http\Controllers\Frontend\FestivalsController::class, 'index'])->name('fe.artifacts.detail');
});

Route::group(['prefix' => 'nhan-vat'], function() {
    Route::get('/', [App\Http\Controllers\Frontend\FestivalsController::class, 'index'])->name('fe.characters.index');
    Route::get('/{slug}', [App\Http\Controllers\Frontend\FestivalsController::class, 'index'])->name('fe.characters.detail');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    Route::group(['prefix' => '/'], function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    });
    
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

    Route::group(['prefix' => 'artifacts'], function() {
        Route::get('/', [ArtifactsController::class, 'index'])->name('artifacts.index');

        Route::get('/create', [ArtifactsController::class, 'create'])->name('artifacts.create');
        Route::post('/create', [ArtifactsController::class, 'store'])->name('artifacts.store');

        Route::get('/edit/{id}', [ArtifactsController::class, 'edit'])->name('artifacts.edit');
        Route::post('/update/{id}', [ArtifactsController::class, 'update'])->name('artifacts.update');

        Route::post('/delete/{id}', [ArtifactsController::class, 'destroy'])->name('artifacts.destroy');
    });
    
    Route::group(['prefix' => 'characters'], function() {
        Route::get('/', [CharactersController::class, 'index'])->name('characters.index');

        Route::get('/create', [CharactersController::class, 'create'])->name('characters.create');
        Route::post('/create', [CharactersController::class, 'store'])->name('characters.store');

        Route::get('/edit/{id}', [CharactersController::class, 'edit'])->name('characters.edit');
        Route::post('/update/{id}', [CharactersController::class, 'update'])->name('characters.update');

        Route::post('/delete/{id}', [CharactersController::class, 'destroy'])->name('characters.destroy');
    });

    Route::group(['prefix' => 'festivals'], function() {
        Route::get('/', [FestivalsController::class, 'index'])->name('festivals.index');

        Route::get('/create', [FestivalsController::class, 'create'])->name('festivals.create');
        Route::post('/create', [FestivalsController::class, 'store'])->name('festivals.store');

        Route::get('/edit/{id}', [FestivalsController::class, 'edit'])->name('festivals.edit');
        Route::post('/update/{id}', [FestivalsController::class, 'update'])->name('festivals.update');

        Route::post('/delete/{id}', [FestivalsController::class, 'destroy'])->name('festivals.destroy');
    });
});
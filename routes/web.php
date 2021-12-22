<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhotbaController;
use App\Http\Controllers\UserController;
use App\Models\Khotba;

/**  */

Route::get('/', function () {
    $khotbas = Khotba::orderby('id','desc')->limit(3)->get();
    $khotba = Khotba::orderby('id','desc')->first();
    return view('welcome',compact('khotbas','khotba'));
})->name('welcome_page');

/** user */
Route::get('user/store',[UserController::class,'store'])
    ->middleware(['auth'])
    ->name('user.store');

/** dashboard */
Route::get('dashboard',[KhotbaController::class,'dashboard'])
    ->middleware(['auth'])
    ->name('dashboard');
/** khotba */
Route::prefix('khotba')->group(function () {

    Route::get('{khotba}/show',[KhotbaController::class,'show'])
    ->name('khotba.show');

    Route::get('{khotba}/edit',[KhotbaController::class,'edit'])
    ->middleware(['auth','KhotbaPermission:{khotba}'])
    ->name('khotba.edit');

    Route::get('{khotba}/destroy',[KhotbaController::class,'destroy'])
    ->middleware(['auth','KhotbaPermission:{khotba}'])
    ->name('khotba.destroy');

    Route::post('{khotba}/update',[KhotbaController::class,'update'])
    ->middleware(['auth','KhotbaPermission:{khotba}'])
    ->name('khotba.update');

    Route::post('store',[KhotbaController::class,'store'])
    ->middleware(['auth'])
    ->name('khotba.store');

    Route::get('search',[KhotbaController::class,'search'])
    ->name('khotba.search');

    Route::post('search',[KhotbaController::class,'search'])
    ->name('khotba.search');
});



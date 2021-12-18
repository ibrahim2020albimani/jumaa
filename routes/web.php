<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KhotbaController;
use App\Models\Khotba;
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
    $khotbas = Khotba::orderby('id','desc')->limit(5)->get();
    $khotba = Khotba::orderby('id','desc')->first();
    return view('welcome',compact('khotbas','khotba'));
})->name('welcome_page');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $khotba = App\Models\Khotba::orderby('id','desc')->first();
    return view('dashboard',compact('khotba'));
})->name('dashboard');



/** building */
Route::prefix('khotba')->group(function () {
    // Route::get('{khotba}/edit',[KhotbaController::class,'edit'])->name('khotba.edit');
    // Route::post('{khotba}/update',[KhotbaController::class,'update'])->name('khotba.update');
    Route::get('{khotba}/destroy',[KhotbaController::class,'destroy'])
    ->middleware('auth')
    ->name('khotba.destroy');
    Route::post('store',[KhotbaController::class,'store'])->name('khotba.store');
    Route::get('search',[KhotbaController::class,'search'])->name('khotba.search');
    Route::post('search',[KhotbaController::class,'search'])->name('khotba.search');
});
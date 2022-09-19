<?php

use App\Http\Controllers\FAHPCalculationController;
use Illuminate\Support\Facades\Route;

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
    return view('fahp.index');
})->name('home');

Route::get('fahp/create', [FAHPCalculationController::class, 'create'])->name('fahp.create');
Route::post('fahp', [FAHPCalculationController::class, 'store'])->name('fahp.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

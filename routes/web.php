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
    return view('index');
})->name('index');

Route::get('/test', function () {
    return view('test');
});

// Food Packaging Material
Route::get('food-packaging-material', function () {
    return view('food-packaging-material.index');
})->name('food-packaging-material.index');

// Food Type for Production
Route::get('food-type-for-production', function () {
    return view('food-type-for-production.index');
})->name('food-type-for-production.index');

Route::get('food-type-for-production/calculation', function () {
    return view('food-type-for-production.calculation');
})->name('food-type-for-production.calculation');

Route::get('food-type-for-production/calculation/fahp', [FAHPCalculationController::class, 'create'])
    ->name('food-type-for-production.calculation.fahp');

Route::post('food-type-for-production/calculation/fahp', [FAHPCalculationController::class, 'store'])
    ->name('food-type-for-production.calculation.fahp.store');

// Route::get('/fahp', function () {
//     return view('fahp.index');
// })->name('home');
// Route::get('fahp/create', [FAHPCalculationController::class, 'create'])->name('fahp.create');
// Route::post('fahp', [FAHPCalculationController::class, 'store'])->name('fahp.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

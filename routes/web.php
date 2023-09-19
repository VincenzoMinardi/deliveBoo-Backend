<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;

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
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::resource('/dashboard', RestaurantController::class);
Route::get('/plates/create', [PlateController::class, 'create'])->name('plates.create');
Route::get('/plates/{plate}', [PlateController::class, 'edit'])->name('plates.edit');
Route::post('/plates', [PlateController::class, 'store'])->name('plates.store'); //per l'archiviazione dei dati del piatto
Route::put('/plates/{plate}', [PlateController::class, 'update'])->name('plates.update');
Route::delete('/plates/{plate}', [PlateController::class, 'destroy'])->name('plates.destroy');





require __DIR__ . '/auth.php';

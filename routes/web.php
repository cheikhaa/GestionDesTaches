<?php

use App\Http\Controllers\TacheController;
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



Route::get('/', [TacheController::class, 'listeTache'])->name('listeTache');

Route::get('/tache/ajout', [TacheController::class, 'ajoutTache'])->name('ajoutTache');

Route::post('/ajout/traitement', [TacheController::class, 'traitement'])->name('traitement');

Route::post('/update/traitement', [TacheController::class, 'updateTraitement'])->name('updateTraitement');

Route::get('update/{id}', [TacheController::class, 'updateTache'])->name('updateTache');

Route::get('delete/{id}', [TacheController::class, 'deleteTache'])->name('deleteTache');
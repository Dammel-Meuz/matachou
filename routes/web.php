<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\LivreurController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommandeController;

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
});

Route::get('/', 'App\Http\Controllers\Controller@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('articles', ArticleController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('commandes', CommandeController::class);
    Route::resource('livreurs', LivreurController::class);
    Route::resource('depenses', DepenseController::class);
    Route::post('depenses/search', [DepenseController::class, 'search'])->name('search.recherche');
    Route::post('depenses/searchByMonth', [DepenseController::class, 'searchByMonth'])->name('searchByMonth');
    Route::post('depenses/annuler-recherche', [DepenseController::class, 'annulerRecherche'])->name('depenses.annulerRecherche');
    Route::patch('/commandes/{commande}/updateStatus', [CommandeController::class, 'updateStatus'])->name('commandes.updateStatus');
});

Route::get('/dashboard', function () {
    return redirect()->route('articles.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/depenses/search', 'DepenseController@search')->name('depenses.search');
});

require __DIR__.'/auth.php';

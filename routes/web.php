<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\HomeController;
use \App\Http\Controllers\IndexController;
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
Auth::routes(['verify'=> true]);

route::get('/', [IndexController::class, 'index'])->name('index');

// Annonces
Route::get('/annonces', [AnnonceController::class, 'index'])->name('home');
Route::get('/annonces/add', [AnnonceController::class, 'showCreateAnnonce'])->name('annonce.create.show');
Route::post('/annonces/add/new', [AnnonceController::class, 'createAnnonce'])->name('annonce.create.new');
Route::get('/annonces/{id}', [AnnonceController::class, 'showAnnonce'])->name('annonce.show');
Route::get('/annonces/{id}/edit', [AnnonceController::class, 'editAnnonce'])->name('annonce.edit');
Route::post('/annonces/{id}/edit/update', [AnnonceController::class, 'updateAnnonce'])->name('annonce.edit.update');
Route::get('/annonces/{id}/delete', [AnnonceController::class, 'deleteAnnonce'])->name('annonce.delete');

Route::prefix('admin')->group(static function () {
    // tout ce qui a la dedans c'est dans /admin
    Route::get('/', [AdminController::class, 'showIndex'])->name('admin.index');

// Page users
    Route::get('/users', [AdminController::class, 'showUsers'])->name('admin.users');
    Route::get('/users/{id}', [AdminController::class, 'showUserEdit'])->name('admin.users.edit');
    Route::post('/users/{id}/update', [AdminController::class, 'userUpdate'])->name('admin.users.edit.update');
    Route::get('/user/{id}/delete', [AdminController::class, 'userDelete'])->name('admin.users.delete');

});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\EpisodeController;

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
// Main functions
Route::view('/', 'pages.main.home')->name('home');
Route::get('/', [AnimeController::class, 'carousel'])->name('pages.main.home');
Route::get('/episode/{id}', [EpisodeController::class, 'show'])->name('pages.main.episode');
Route::get('/anime/{id}', [AnimeController::class, 'show'])->name('pages.main.anime');
Route::get('/az-list', [AnimeController::class, 'azlist'])->name('pages.main.azlist');
Route::get('/anime/{id}', [AnimeController::class, 'show'])->name('anime.show');
Route::get('/episode/{id}', [EpisodeController::class, 'show'])->name('episode.show');
Route::get('/search-anime', [AnimeController::class, 'search']);
Route::get('/anime/{id}/episode/{episode_number}', [AnimeController::class, 'showEpisode'])->name('pages.main.episode');

// Register & login functions
Route::view('/login', 'pages.login')->name('login');
Route::view('/register', 'pages.register')->name('register');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

//Function for logout
Route::group(['middleware' => ['auth']], function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // DASHBOARD FOR WEBSITE ADMIN
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
    Route::get('/admin/anime/create', [AnimeController::class, 'create'])->name('admin.add-anime');
    Route::post('admin/anime', [AnimeController::class, 'store'])->name('admin.add-anime');

    Route::get('/admin/episode/create', [EpisodeController::class, 'create'])->name('admin.add-episode');
    Route::post('/admin/episode', [EpisodeController::class, 'store'])->name('admin.add-episode');

    Route::get('/admin/anime/{id}/edit', [AnimeController::class, 'edit'])->name('admin.edit-anime');
    Route::put('/admin/anime/{id}/edit', [AnimeController::class, 'update'])->name('anime.edit-anime');

    Route::get('/admin/episode/{id}/edit', [EpisodeController::class, 'edit'])->name('admin.edit-episode');
    Route::put('/admin/episode/{id}/edit', [EpisodeController::class, 'update'])->name('anime.edit-episode');

    Route::get('/admin/animes', [AnimeController::class, 'index'])->name('admin.animes');
    Route::get('/admin/episodes', [EpisodeController::class, 'index'])->name('admin.episodes');
    Route::delete('/admin/anime/{id}', [AnimeController::class, 'destroy'])->name('admin.anime.delete');
    Route::delete('/admin/episodes/{id}', [EpisodeController::class, 'destroy'])->name('admin.delete-episode');
});

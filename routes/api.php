<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SongController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PlaylistController;


// Rotas para as músicas
Route::get('/songs', [SongController::class, 'index']); 
Route::get('/songs/{id}', [SongController::class, 'show']); 
Route::post('/songs', [SongController::class, 'store']);
Route::put('/songs/{id}', [SongController::class, 'update']);
Route::delete('/songs/{id}', [SongController::class, 'destroy']); 

// Rotas para as playlists
Route::get('/playlists', [PlaylistController::class, 'index']);
Route::get('/playlists/{playlistId}', [PlaylistController::class, 'show']); //retorna o id da respectiva playlist
Route::get('/playlists/{playlistId}/songs', [PlaylistController::class, 'showSongs']); //retorna playlists com as musicas dentro 
Route::post('/playlists/{playlistId}/songs', [PlaylistController::class, 'addSong']); //vai adicionar uma musica a playlist determinada
Route::delete('/playlists/{playlistId}/songs', [PlaylistController::class, 'removeSong']); 

Route::post('/playlists', [PlaylistController::class, 'store']); 
Route::put('/playlists/{playlistId}', [PlaylistController::class, 'update']);
Route::delete('/playlists/{playlistId}', [PlaylistController::class, 'destroy']);

// Rotas para as favoritos

Route::get('/favorites', [FavoriteController::class, 'index']);
Route::post('/favorites', [FavoriteController::class, 'addFavorite']);
Route::delete('/favorites', [FavoriteController::class, 'removeFavorite']);
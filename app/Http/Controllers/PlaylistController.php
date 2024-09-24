<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{

    public function index()
    {
        $playlists = Playlist::query()->orderBy('created_at', 'desc')->get();
        return response()->json($playlists);
    }

    public function show($playlistId)
    {
        $playlist = Playlist::findOrFail($playlistId);
        return response()->json($playlist);
    }


    public function showSongs($playlistId) {
        $playlist = Playlist::findOrFail($playlistId);
        return response()->json($playlist->songs);
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required|string|max:255',
        ]);
        
        $playlist = Playlist::create($validator);
        return response()->json(['message' => 'Playlist criada com sucesso!', 'playlist' => $playlist]);
    }

    public function addSong(Request $request, $playlistId) {
        $playlist = Playlist::findOrFail($playlistId);
        $songId = $request->input('song_id');
        $playlist->songs()->attach($songId);
        return response()->json(['message' => 'Música adicionada à playlist!', 'playlist' => $playlist]);
    }
    
    public function removeSong(Request $request, $playlistId) {
        $playlist = Playlist::findOrFail($playlistId);
        $songId = $request->input('song_id');
        $playlist->songs()->detach($songId);
        return response()->json(['message' => 'Música removida da playlist!', 'playlist' => $playlist]);
    }   
}
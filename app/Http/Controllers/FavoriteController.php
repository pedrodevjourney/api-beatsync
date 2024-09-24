<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $favoritos = Favorite::with('song')->get();
        return response()->json($favoritos);
    }

    public function addFavorite(Request $request)
    {
        $musicaId = $request->input('song_id');
        $favoritoExistente = Favorite::where('song_id', $musicaId)->first();
        if ($favoritoExistente) {
            return response()->json(['message' => 'A música já está nos favoritos!']);
        }
        Favorite::create(['song_id' => $musicaId]);
        return response()->json(['message' => 'Música adicionada aos favoritos!', 'song_id' => $musicaId]);
    }

    public function removeFavorite(Request $request)
    {
        $musicaId = $request->input('song_id'); 
        $favorito = Favorite::where('song_id', $musicaId)->first();
        if (!$favorito) {
            return response()->json(['message' => 'Música não encontrada nos favoritos!'], 404);
        }
        $favorito->delete();
        return response()->json(['message' => 'Música removida dos favoritos!', 'song_id' => $musicaId]);
    }
}

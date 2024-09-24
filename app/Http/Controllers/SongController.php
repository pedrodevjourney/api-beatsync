<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::query()->orderBy('created_at', 'desc')->get();

        return response()->json($songs); 

    }

    public function show($id)
    {
        $song = Song::find($id);
        return response()->json($song);
    }
    public function listSongs()
    {
        
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required',
            'artist' => 'nullable',
            'artwork' => 'nullable',
            'url' => 'nullable',
            'rating' => 'nullable',
            

        ]);
        $song = Song::create($validator);
        return response()->json(['message' => 'Música criada com sucesso!', 'song' => $song], 201);

    }

    public function update(Request $request, $id)
    {
        $song = Song::find($id);
        $song->update($request->all());
        return response()->json(['message' => 'Música atualizada com sucesso!', 'song' => $song], 200);
    }

    public function destroy($id)
    {
        $song = Song::find($id);
        $song->delete();
        return response()->json(['message' => 'Música excluída com sucesso!', 'song' => $song], 200);
    }
}
<?php

namespace Database\Seeders;

use App\Models\Favorite;
use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Database\Seeder;

class FavoriteSeeder extends Seeder
{
    public function run()
    {
        $songIds = Song::pluck('id')->toArray();
        $playlistIds = Playlist::pluck('id')->toArray();

        foreach ($songIds as $songId) {
            $favorite = Favorite::create([
                'song_id' => $songId,
            ]);

            if (!empty($playlistIds)) {
                $favorite->playlists()->sync($playlistIds);
            }
        }
    }
}
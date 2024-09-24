<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaylistSongSeeder extends Seeder
{
    public function run()
    {
        $playlistInternacional = DB::table('playlists')->where('name', 'Playlist Internacional')->value('id');
        $playlistBrasileira = DB::table('playlists')->where('name', 'Playlist Brasileira')->value('id');   
        $playlistEspanhola = DB::table('playlists')->where('name', 'Playlist Espanhola')->value('id');   

        if (is_null($playlistInternacional) || is_null($playlistBrasileira) || is_null($playlistEspanhola)) {
            $this->command->error('Nenhuma das playlists existem!');
            return;
        }

        DB::table('playlist_song')->insert([
            [
                'playlist_id' => $playlistEspanhola,
                'song_id' => 1,
            ],
            [
                'playlist_id' => $playlistBrasileira,
                'song_id' => 2,
            ],
            [
                'playlist_id' => $playlistInternacional,
                'song_id' => 3,
            ],
        ]);
    }
}
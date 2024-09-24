<?php

namespace Database\Seeders;

use App\Models\Playlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaylistSeeder extends Seeder
{
    public function run()
    {
        $playlists = [
            'Playlist Internacional',
            'Playlist Brasileira',
            'Playlist Espanhola',
        ];

        foreach ($playlists as $name) {
            Playlist::create([
                'name' => $name
            ]);
        }
    }
}
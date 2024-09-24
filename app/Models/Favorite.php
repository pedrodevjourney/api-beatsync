<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'song_id',
    ];

    public function song() {
        return $this->belongsTo(Song::class);
    }

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'favorite_playlist', 'favorite_id', 'playlist_id');
    }
}

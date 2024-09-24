<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function songs() {
        return $this->belongsToMany(Song::class, 'playlist_song', 'playlist_id', 'song_id');
    }

    public function favorites()
    {
        return $this->belongsToMany(Favorite::class, 'favorite_playlist', 'playlist_id', 'favorite_id');
    }
}
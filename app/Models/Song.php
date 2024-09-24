<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Song extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'url',
        'artwork',
        'rating',
        'title',
        'artist',
    ];

    public function playlists() {
        return $this->belongsToMany(Playlist::class, 'playlist_song', 'song_id', 'playlist_id');
    }
    
    public function favorites() {
        return $this->hasMany(Favorite::class);
    }
}
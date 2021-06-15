<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'air_date',
        'character_id',
    ];

    public function characters()
    {
        return $this->belongsToMany(Character::class, 'character_episodes');
    }
    public function quotes()
    {
        return $this->hasManyThrough(Quote::class, CharacterEpisode::class, 'episode_id', 'character_id', 'id', 'character_id');
    }


}




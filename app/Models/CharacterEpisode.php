<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacterEpisode extends Model
{
    use HasFactory;

    protected $table="character_episodes";

    protected $fillable = [
        'character_id', 
        'episode_id',
    ];
}

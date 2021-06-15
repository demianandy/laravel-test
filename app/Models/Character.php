<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quote;

class Character extends Model
{
    use HasFactory;

    protected $casts = [
        'occupations' => 'array',
    ];

    protected $fillable = [
        'name', 
        'birthday',
        'occupations', 
        'img',
        'nickname', 
        'portrayed',
        'quote_id',
        'episode_id',
    ];

    public function quotes()
    {
        return $this->hasMany(Quote::class);
    }

    public function episodes()
    {
        return $this->belongsToMany(Episode::class, 'character_episodes')->withTimestamps();
    }
}

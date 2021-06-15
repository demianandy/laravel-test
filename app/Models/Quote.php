<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Character;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'quote',
        'character_id',
    ];

    public function character()
    {
        return $this->belongsTo(Character::class);
    }
}

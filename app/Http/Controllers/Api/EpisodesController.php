<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Episode;
use App\Models\Character;
use App\Models\Quote;

class EpisodesController extends Controller
{
    public function showEpisodes()
    {
        $episodes = Episode::with(['characters', 'quotes'])->get();

        return response()->json($episodes, 201);
    }

    public function showEpisode($id)
    {
        $episode = Episode::with(['characters'])->find($id);

        if(!$episode) {
            return response()->json([
                "status" => false,
                "message" => "Episode not found",
            ])->setStatusCode(404, "Эпизод не найден");
        }

        return response()->json($episode, 201);
    }

    public function showCharacter($id)
    {
        $character = Character::with(['quotes', 'episodes'])->find($id);

        if(!$character) {
            return response()->json([
                "status" => false,
                "message" => "Character not found",
            ])->setStatusCode(404, "Артист не найден");
        }

        return response()->json($character, 201);
    }

    public function showQuote($id)
    {
        $quote = Quote::with(['character'])->find($id);

        if(!$quote) {
            return response()->json([
                "status" => false,
                "message" => "Quote not found",
            ])->setStatusCode(404, "Фраза не найдена");
        }

        return response()->json($quote, 201);
    }

    
    public function randomCharacter()
    {
        $character = Character::with(['quotes', 'episodes'])->inRandomOrder()->first();

        if(!$character) {
            return response()->json([
                "status" => false,
                "message" => "Character not found",
            ])->setStatusCode(404, "Артист не найден");
        }

        return response()->json($character, 201);
    }

    public function showCharacters()
    {
        $characters = Character::with(['episodes', 'quotes'])->get();

        return response()->json($characters, 201);
    }

    public function showQuotes()
    {
        $quotes = Quote::with(['character'])->get();

        return response()->json($quotes, 201);
    }
}

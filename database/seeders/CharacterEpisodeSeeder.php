<?php

namespace Database\Seeders;

use \App\Models\CharacterEpisode;
use \App\Models\Character;
use \App\Models\Episodes;
use Illuminate\Database\Seeder;

class CharacterEpisodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 101; ++$i) {
            CharacterEpisode::factory()->count(3)->create(['character_id' => $i]);
        }

    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(EpisodeSeeder::class);
        $this->call(CharacterSeeder::class);
        $this->call(QuoteSeeder::class);
        $this->call(CharacterEpisodeSeeder::class);
        $this->call(UserSeeder::class);
    }
}

<?php

namespace Database\Factories;

use App\Models\CharacterEpisode;
use App\Models\Episode;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterEpisodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CharacterEpisode::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'episode_id' => $this->faker->numberBetween($min = 1, $max = 30),
        ];

    }
}

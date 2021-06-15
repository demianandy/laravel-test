<?php

namespace Database\Factories;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\Factory;

class CharacterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Character::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

            return [
                'name' => $this->faker->firstNameMale.' '.$this->faker->lastName($gender = 'male'),
                'birthday' => $this->faker->dateTimeBetween('1930-01-01', '2000-12-31')->format('Y-m-d'),
                'occupations' => ["Главная роль" => $this->faker->jobTitle(), "Каскадерская роль" => $this->faker->jobTitle()],
                'img' => $this->faker->unique()->numberBetween($min = 1, $max = 100),
                'nickname' => $this->faker->word(1),
                'portrayed' => $this->faker->firstNameMale.' '.$this->faker->lastName($gender = 'male'),

                
            ];

    }
}

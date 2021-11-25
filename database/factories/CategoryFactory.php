<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => [
                'en' => 'en' . $this->faker->text(20),
                'pl' => 'pl' . $this->faker->text(20),
                'ru' => 'ru' . $this->faker->text(20),
            ],
        ];
    }
}

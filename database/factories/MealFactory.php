<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MealFactory extends Factory
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
                'en' => 'en'.$this->faker->text('20'),
                'pl' => 'pl'.$this->faker->text('20'),
                'ru' => 'ru'.$this->faker->text('20'),
            ],
            'description' => [
                'en' => 'en'.$this->faker->text('50'),
                'pl' => 'pl'.$this->faker->text('50'),
                'ru' => 'ru'.$this->faker->text('50'),
            ],
            'price' => rand(1, 100),
            'category_id' => rand(1, 10),
        ];
    }
}

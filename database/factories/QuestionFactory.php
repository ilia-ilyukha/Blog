<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(5),
            'question' => $this->faker->sentence(10),
            'answer' => $this->faker->sentence(10),
            'tag' => 'php',
            'status' => 1
        ];

    }
}

<?php

namespace Database\Factories\admin;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => '2',
            'title' => 	$this->faker->sentence(5),
            'annotation' => $this->faker->sentence(15),
            'body' => $this->faker->sentence(200),
            'created_at' => $this->faker->dateTimeBetween('-30 days', '-10 days'),
            'image' => "no_image.jpg",
            'published' => '1'
        ];

    }
}

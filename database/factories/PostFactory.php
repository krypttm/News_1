<?php

namespace Database\Factories;

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
            'title' => $this->faker->unique()->title(),
            'text' => $this->faker->text(),
            'cat_id' =>$this->faker->cat_id(),
        ];
    }
}

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
            'img' =>$this->faker->word(). 'img',
            'text' => $this->faker->text(),
            'user_id' =>$this->faker->numberBetween(1,10),
            'category_id' => $this->faker->numberBetween(1,5)
        ];
    }
}

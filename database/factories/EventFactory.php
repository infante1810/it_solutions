<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
           // 'location' => $this->faker->address(),
            'total_cost' => $this->faker->randomFloat(2, 20, 100),
            'user_id' => $this->faker->numberBetween(1,10),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\ChurchClass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assigment>
 */
class AssigmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'description' => fake()->paragraph(),
            'due_by' => fake()->dateTimeBetween('-1 month', '+1 month'),
            'class_id' => fake()->numberBetween(1, ChurchClass::count()),
            'created_by' => fake()->numberBetween(1, 50),
        ];
    }
}

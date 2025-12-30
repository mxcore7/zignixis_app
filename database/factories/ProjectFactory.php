<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'slug' => $this->faker->slug(),
            'client_name' => $this->faker->company(),
            'sector' => $this->faker->randomElement(['Industrie', 'Finance', 'Santé', 'Commerce']),
            'description' => $this->faker->paragraph(),
            'solution' => $this->faker->sentence(),
            'results' => $this->faker->sentence(),
            'image' => null,
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

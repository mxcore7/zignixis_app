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
            'title' => ['fr' => $this->faker->sentence(4), 'en' => $this->faker->sentence(4)],
            'slug' => $this->faker->unique()->slug(),
            'client_name' => $this->faker->company(),
            'sector' => $this->faker->randomElement(['Industrie', 'Finance', 'Santé', 'Commerce']),
            'description' => ['fr' => $this->faker->paragraph(), 'en' => $this->faker->paragraph()],
            'solution' => ['fr' => $this->faker->paragraph(), 'en' => $this->faker->paragraph()],
            'results' => ['fr' => $this->faker->paragraph(), 'en' => $this->faker->paragraph()],
            'featured_image' => null, // or a path
            'images' => [],
            'published_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'user_id' => null, // Can be overriden
            'status' => $this->faker->randomElement(['pending', 'in_progress', 'completed']),
            'deadline' => $this->faker->dateTimeBetween('now', '+6 months'),
        ];
    }
}

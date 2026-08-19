<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
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
            'content' => fake()->text(1000),
            'categoria' => fake()->word(),
            'published_at' => fake()->dateTime(),
        ];
    }
}

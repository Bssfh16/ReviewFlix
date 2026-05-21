<?php

namespace Database\Factories;

use App\Models\NewsItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<NewsItem>
 */
class NewsItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraphs(2, true),
            'image' => $this->faker->imageUrl(),
            'user_id' => User::factory(),
        ];
    }
}

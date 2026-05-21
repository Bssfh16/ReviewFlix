<?php

namespace Database\Factories;

use App\Models\Review;
use App\Models\User;
use App\Models\MediaItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Review>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'media_item_id' => MediaItem::factory(),
            'rating' => $this->faker->numberBetween(1, 5),
            'opinion' => $this->faker->paragraphs(2, true),
        ];
    }
}

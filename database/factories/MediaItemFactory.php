<?php

namespace Database\Factories;

use App\Models\MediaItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<MediaItem>
 */
class MediaItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $types = ['Movie', 'Serie'];
        $genres = ['Horror', 'Comedy', 'Action', 'Sci-Fi', 'Thriller', 'Drama', 'Animation', 'Romance', 'Biopic', 'Documentary', 'Adventure'];

        return [
            'type' => $this->faker->randomElement($types),
            'title' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl(),
            'summary' => $this->faker->paragraphs(5, true),
            'genre' => $this->faker->randomElement($genres),
            'duration' => $this->faker->numberBetween(65, 190),
            'release_date' => $this->faker->date(),            
        ];
    }
}

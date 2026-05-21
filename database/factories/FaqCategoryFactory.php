<?php

namespace Database\Factories;

use App\Models\FaqCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FaqCategory>
 */
class FaqCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $subjects = ['Account', 'Reviews', 'Global', 'Films', 'Features', 'Series', 'Contact'];

        return [
            'subject' => $this->faker->randomElement($subjects),
        ];
    }
}

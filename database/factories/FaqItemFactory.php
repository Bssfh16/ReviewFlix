<?php

namespace Database\Factories;

use App\Models\FaqItem;
use App\Models\FaqCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<FaqItem>
 */
class FaqItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'faq_category_id' => FaqCategory::inRandomOrder()->first()->id,
            'question' => $this->faker->sentence() . '?',
            'answer' => $this->faker->paragraphs(2, true),
        ];
    }
}

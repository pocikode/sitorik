<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => '',
            'title' => fake()->sentence,
            'slug' => fake()->slug,
            'image' => null,
            'article-trixFields' => fake()->paragraphs(4),
            'is_publish' => '1',
        ];
    }
}

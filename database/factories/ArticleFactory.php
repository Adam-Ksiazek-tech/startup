<?php

namespace Database\Factories;

use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // dopisuję co ma być tworzone automatycznie do testów
            'title' => fake()->sentence(),
            'body' => collect(range(1, 200)) // ok. 1000–1200 słów
                ->map(fn () => fake()->sentence())
                ->implode(' '),
            'publication_date' => fake()->date(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}

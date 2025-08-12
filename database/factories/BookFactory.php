<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        // 'author_id'   => \App\Models\Author::inRandomOrder()->value('id') ?? \App\Models\Author::factory(),
        // 'category_id' => \App\Models\Category::inRandomOrder()->value('id') ?? \App\Models\Category::factory(),
        // // Hindari sentence(3) unik — cepat habis
        // 'title' => 'Book ' . fake()->unique()->numberBetween(1, 10_000_000),
        'author_id'   => \App\Models\Author::inRandomOrder()->value('id') ?? \App\Models\Author::factory(),
        'category_id' => \App\Models\Category::inRandomOrder()->value('id') ?? \App\Models\Category::factory(),
        // Judul lorem 3 kata + nomor unik supaya aman untuk 100k
        'title' => Str::title(fake()->unique()->words(4, true)),
        ];
    }
}

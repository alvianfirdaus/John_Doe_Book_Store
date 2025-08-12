<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book; // import model biar lebih bersih

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Rating>
 */
class RatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // Pilih book_id acak, kalau belum ada buku maka buat baru
            'book_id' => Book::query()->inRandomOrder()->value('id') ?? Book::factory(),
            // Nilai rating 2 desimal dari 1.00 sampai 10.00
            'score'   => $this->faker->randomFloat(2, 1, 10),
        ];
    }
}

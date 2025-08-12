<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Author;
use App\Models\Category;
use App\Models\Book;
use App\Models\Rating;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Authors (1,000 data)
        $this->command->info('Seeding Authors...');
        Author::factory()->count(1000)->create();

        // 2. Categories (3,000 data)
        $this->command->info('Seeding Categories...');
        Category::factory()->count(3000)->create();

        // 3. Books (100k data dalam chunk 5,000)
        $this->command->info('Seeding Books...');
        $bookChunks = ceil(100000 / 5000);
        for ($i = 1; $i <= $bookChunks; $i++) {
            Book::factory()->count(5000)->create();
            $this->command->info("  Book chunk {$i} of {$bookChunks} done.");
            unset($books);
        }

        // 4. Ratings (500k data dalam chunk 10,000)
        $this->command->info('Seeding Ratings...');
        $ratingChunks = ceil(500000 / 10000);
        for ($i = 1; $i <= $ratingChunks; $i++) {
            Rating::factory()->count(10000)->create();
            $this->command->info("  Rating chunk {$i} of {$ratingChunks} done.");
            unset($ratings);
        }

        $this->command->info('Database seeding completed successfully!');
    }
}

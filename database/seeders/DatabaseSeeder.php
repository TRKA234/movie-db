<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Movie;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Jalankan seeder kategori terlebih dahulu
        $this->call(CategorySeeder::class);

        // Generate 20 data movie dummy
        Movie::factory()->count(50)->create();
    }
}

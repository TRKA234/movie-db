<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence(rand(3,6));
        $slug = Str::slug($title);
        return [
            'title' => $title,
            'slug' => $slug,
            'synopsis' => fake()->paragraph(),
            'category_id' =>Category::inRandomOrder()->first(),
            'year' => fake()->year(),
            'actors' => fake()->name() . ',' . fake()->name() . ',' . fake()->name(),
            'cover_image' => 'https://picsum.photos/seed' . Str::random(10) . '/480/640',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

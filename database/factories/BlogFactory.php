<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();

        $keywords = $this->faker->words(rand(5, 15));
        $keywords = implode(', ', $keywords);

        $has_image = rand(0, 1);

        if ($has_image != 0) {
            $image = $this->faker->imageUrl(640, 480, 'technology', true);
        } else {
            $image = null;
        }

        return [
            'title' => $title,
            'slug' => Str::slug($title, '-'),
            'author' => $this->faker->name(),
            'published' => true,
            'use_global' => true,
            'keywords' => $keywords,
            'description' => $this->faker->sentences(rand(3, 12), true),
            'image' => $image,
            'body' => null,
        ];

    }
}

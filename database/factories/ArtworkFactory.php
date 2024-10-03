<?php

namespace Database\Factories;

use App\Models\Collection;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ArtworkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'collection_id' => Collection::factory(),
            'image_url' => fake()->imageUrl(),
            'description' => 'This is a description',
            'creation_date' => fake()->date($format = 'Y-m-d'),
            'medium' => 'watercolor',
            'dimensions' => 'A4'
        ];
    }
}

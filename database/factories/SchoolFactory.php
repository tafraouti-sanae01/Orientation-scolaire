<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\School;

class SchoolFactory extends Factory
{
    protected $model = School::class;

    public function definition(): array
    {
        return [
            'name' => fake()->company().' School',
            'logo' => fake()->imageUrl(256, 256, 'education', true, 'logo'),
            'description' => fake()->paragraph(),
            'type' => fake()->randomElement(['Public', 'Private']),
            'university' => fake()->company().' University',
            'fees' => (string) fake()->numberBetween(0, 50000),
            // Ces deux colonnes existent via ta migration d’augmentation
            'category' => fake()->randomElement(['ingenieur','commerce','sante','architecture','technique','specialise']),
            'seuils' => (string) fake()->numberBetween(10, 18),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Concours;

class ConcoursFactory extends Factory
{
    protected $model = Concours::class;

    public function definition(): array
    {
        return [
            'name' => 'Concours '.fake()->unique()->word(),
            'category' => fake()->randomElement(['ingenieur','commerce','sante','education','formation','specialise']),
            'inscription' => fake()->randomElement(['Inscriptions ouvertes','Inscriptions fermées']),
            'epreuve' => fake()->randomElement(['Écrit','Oral','Mixte']),
            'description' => fake()->paragraph(),
            'filieres' => fake()->randomElement(['SCI-MATH','PC','SVT','ECO','Lettres']),
            'places' => (string) fake()->numberBetween(10, 500),
            'conditions' => fake()->sentence(),
            'site' => fake()->url(),
            'status' => fake()->randomElement(['open','closed','soon']),
            'color' => fake()->hexColor(),
        ];
    }
}

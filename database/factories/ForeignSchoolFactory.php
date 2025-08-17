<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ForeignSchool;

class ForeignSchoolFactory extends Factory
{
    protected $model = ForeignSchool::class;

    public function definition(): array
    {
        return [
            'name' => fake()->company().' International University',
            'country' => fake()->country(),
            'city' => fake()->city(),
            'is_free' => fake()->boolean(30),
            'description' => fake()->paragraph(),
            'website' => fake()->url(),
            'email' => fake()->unique()->companyEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'type' => fake()->randomElement(['ingenieur','commerce','sante','architecture','technique','specialise']),
            'admission_requirements' => fake()->sentence(),
            'language_requirements' => fake()->randomElement(['French B2','English B2','Arabic C1','None']),
            'image' => fake()->imageUrl(640, 480, 'education', true, 'campus'),
        ];
    }
}

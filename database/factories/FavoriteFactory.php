<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\School;
use App\Models\Concours;
use App\Models\ForeignSchool;
use Illuminate\Database\Eloquent\Factories\Factory;

class FavoriteFactory extends Factory
{
    public function definition(): array
    {
        $type = $this->faker->randomElement(['school', 'concours', 'foreign_school']);

        $item_id = match ($type) {
            'school' => School::inRandomOrder()->first()?->id ?? School::factory()->create()->id,
            'concours' => Concours::inRandomOrder()->first()?->id ?? Concours::factory()->create()->id,
            'foreign_school' => ForeignSchool::inRandomOrder()->first()?->id ?? ForeignSchool::factory()->create()->id,
        };

        return [
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory()->create()->id,
            'type' => $type,
            'item_id' => $item_id,
            'item_name' => $this->faker->company,
            'item_category' => $this->faker->word,
            'item_description' => $this->faker->paragraph,
        ];
    }
}

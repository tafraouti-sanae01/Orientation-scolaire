<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\School;
use App\Models\Concours;
use App\Models\ForeignSchool;
use App\Models\Favorite;
use Illuminate\Database\Seeder;

class FavoriteSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $types = ['school', 'concours', 'foreign_school'];

        foreach ($users as $user) {
            foreach ($types as $type) {
                $item_id = match ($type) {
                    'school' => School::inRandomOrder()->first()?->id,
                    'concours' => Concours::inRandomOrder()->first()?->id,
                    'foreign_school' => ForeignSchool::inRandomOrder()->first()?->id,
                };

                if ($item_id) {
                    Favorite::factory()->create([
                        'user_id' => $user->id,
                        'type' => $type,
                        'item_id' => $item_id,
                    ]);
                }
            }
        }
    }
}

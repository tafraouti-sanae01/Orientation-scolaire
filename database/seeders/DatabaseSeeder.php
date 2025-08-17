<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
         User::create([
            'name' => 'Tafraouti Sanae',
            'email' => 'tafraouti.sanae1@gmail.com',
            'email_verified_at' => now(),
            'password' => 'sanae123',
        ]);
        $this->call([
            UserSeeder::class,
            SchoolSeeder::class,
            ConcoursSeeder::class,
            ForeignSchoolSeeder::class,
            FavoriteSeeder::class,
        ]);
    }
}

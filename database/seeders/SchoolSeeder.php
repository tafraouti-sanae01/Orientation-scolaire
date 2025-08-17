<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\SchoolFactory;

class SchoolSeeder extends Seeder
{
    public function run(): void
    {
        SchoolFactory::new()->count(20)->create();
    }
}

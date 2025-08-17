<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\ConcoursFactory;

class ConcoursSeeder extends Seeder
{
    public function run(): void
    {
        ConcoursFactory::new()->count(15)->create();
    }
}

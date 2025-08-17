<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Factories\ForeignSchoolFactory;

class ForeignSchoolSeeder extends Seeder
{
    public function run(): void
    {
        ForeignSchoolFactory::new()->count(15)->create();
    }
}

<?php

namespace Database\Seeders;

use Database\Seeders\SpecialBuildingSeeder;
use Illuminate\Database\Seeder;
use Modules\User\Database\Seeders\UserDatabaseSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SpecialBuildingSeeder::class
        ]);
    }
}

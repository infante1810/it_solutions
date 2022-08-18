<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Database;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Database::factory()->count(10)->create();

    }
}

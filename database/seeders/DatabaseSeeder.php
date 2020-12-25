<?php

namespace Database\Seeders;

use App\Models\kendaraan;
use App\Models\pengiriman;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        pengiriman::factory(1000)->create();
        kendaraan::factory(10)->create();
    }
}

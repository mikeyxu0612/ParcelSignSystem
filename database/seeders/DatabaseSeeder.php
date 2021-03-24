<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ParcelTableSeeder::class);
        $this->call(TenantsTableSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}

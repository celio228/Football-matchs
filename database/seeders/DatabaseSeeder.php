<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Team;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            UserSeeder::class,
        ]);

        Team::create([
        'name' => 'FC Barcelone',
        'creation_year' => 2015,
        'player_count' => 22,
        'logo' => 'barca.png', // à mettre dans public/images
    ]);

    Team::create([
        'name' => 'Real Madrid',
        'creation_year' => 2015,
        'player_count' => 22,
        'logo' => 'madrid.png',
    ]);
    }
}

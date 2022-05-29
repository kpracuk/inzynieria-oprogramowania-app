<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
         Team::factory(10)
             ->hasUsers(10)
             ->create();

         User::factory()->create([
             'firstname' => 'Test',
             'lastname' => 'User',
             'email' => 'user@example.com',
             'team_id' => 1
         ]);
    }
}

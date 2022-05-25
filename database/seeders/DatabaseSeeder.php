<?php

namespace Database\Seeders;

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
         User::factory(50)->create();

         User::factory()->create([
             'firstname' => 'Test',
             'lastname' => 'User',
             'email' => 'user@example.com',
         ]);
    }
}

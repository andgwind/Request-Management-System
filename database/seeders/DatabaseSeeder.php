<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Ticket;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $ticket = Ticket::factory()
            ->count(10)
            ->create();

        \App\Models\User::factory()->create([
            'name' => 'user',
            'email' => 'test@gmail.com',
            'password' => 'password'
        ]);
    }
}

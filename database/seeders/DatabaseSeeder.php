<?php

namespace Database\Seeders;

use App\Models\Announcement;
use App\Models\Assigment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(50)->create();
        Announcement::factory(100)->create();
        Assigment::factory(100)->create();
    }
}

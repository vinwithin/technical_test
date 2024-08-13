<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('divisions')->insert([
            "name" => "Mobile Apps",
        ]);
        DB::table('divisions')->insert([
            "name" => "QA",
        ]);
        DB::table('divisions')->insert([
            "name" => "Full Stack",
        ]);
        DB::table('divisions')->insert([
            "name" => "Backend",
        ]);
        DB::table('divisions')->insert([
            "name" => "Frontend",
        ]);
        DB::table('divisions')->insert([
            "name" => "UI/UX Designer",
        ]);
    }
}

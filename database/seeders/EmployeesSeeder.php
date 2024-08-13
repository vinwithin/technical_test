<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            "image" => "/storage/foto/image 21.png",
            "name" => "Asep",
            "phone" => "082368987147",
            "id_divisions" => "1",
            "position" => "CEO",
        ]);
    }
}

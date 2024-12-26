<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'IT & Software']);
        Category::create(['name' => 'Marketing']);
        Category::create(['name' => 'Design']);
        Category::create(['name' => 'Engineering']);
    }
}

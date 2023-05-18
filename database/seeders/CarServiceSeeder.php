<?php

namespace Database\Seeders;

use App\Domain\CarService\Models\CarService;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CarService::factory()->count(1)->create();
    }
}

<?php

namespace Database\Factories;

use App\Domain\Repair\Models\Repair;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Repair>
 */
class RepairFactory extends Factory
{

    protected $model = Repair::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => 1,
            'car_id' => 1,
            'car_service_id' => 1,
            'issue' => 'far net',
            'price' => 5000
        ];
    }
}

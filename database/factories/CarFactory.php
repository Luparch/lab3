<?php

namespace Database\Factories;

use App\Domain\Car\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{

    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => 1,
            'brand' => 'bmw',
            'model' => 'qwer',
            'number' => '123-abc',
            'owner' => 'owner1'
        ];
    }
}

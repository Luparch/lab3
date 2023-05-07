<?php

namespace App\Domain\Repair\Models;

use Database\Factories\RepairFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repair extends Model
{
    use HasFactory;

    protected $fillable = ['car_id', 'car_service_id', 'issue', 'price'];

    public function carService()
    {
        return $this->hasOne(CarService::class);
    }

    public function car()
    {
        return $this->hasOne(Car::class);
    }

    protected static function newFactory()
    {
        return RepairFactory::new();
    }
}

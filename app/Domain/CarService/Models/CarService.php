<?php

namespace App\Domain\CarService\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\CarServiceFactory;

class CarService extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'address', 'owner'];

    protected static function newFactory()
    {
        return CarServiceFactory::new();
    }
}

<?php

namespace App\Domain\Car\Models;

use Database\Factories\CarFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['brand', 'model', 'number', 'owner'];

    protected static function newFactory()
    {
        return CarFactory::new();
    }
}

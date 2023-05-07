<?php

use App\Domain\Car\Models\Car;

uses(Tests\TestCase::class);

afterEach(function () {
    Car::truncate();
});

test('test get cars', function () {
    $response = $this->get('/api/v1/cars');

    $response->assertStatus(200);
});

test('test post car', function () {
    $car = Car::factory()->raw();

    $response = $this->post('/api/v1/cars', $car);

    $response->assertStatus(201)->assertJson([
        'data' => $car
    ]);
});

test('test get car', function () {
    $raw = Car::factory()->raw();
    $car = Car::create($raw);
    
    $response = $this->get("/api/v1/cars/{$car->id}");

    $response->assertStatus(200)->assertJson([
        'data' => $raw
    ]);
});

test('test delete car', function () {
    $car = Car::factory()->create();
    
    $response = $this->delete("/api/v1/cars/{$car->id}");

    $response->assertStatus(200)->assertJson([
        'data' => null
    ]);
});

test('test patch car', function () {
    $raw = Car::factory()->raw();
    $car = Car::create($raw);

    $body = [
        'owner' => 'owner1111'
    ];    
    $response = $this->patch("/api/v1/cars/{$car->id}", $body);

    $newCar = array_merge($raw, $body);
    $response->assertStatus(200)->assertJson([
        'data' => $newCar
    ]);
});

test('test put car', function () {
    $raw = Car::factory()->raw();
    $car = Car::create($raw);

    $body = [
        'id' => $car->id,
        'brand' => 'bmw',
        'model' => 'qwertyqwerty',
        'number' => '123-abc',
        'owner' => 'owner11111'
    ];
    $response = $this->put("/api/v1/cars/{$car->id}", $body);

    $response->assertStatus(200)->assertJson([
        'data' => $body
    ]);
});

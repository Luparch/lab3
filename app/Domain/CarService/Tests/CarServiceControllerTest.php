<?php

use App\Domain\CarService\Models\CarService;

uses(Tests\TestCase::class);

afterEach(function () {
    CarService::truncate();
});

test('test get car services', function () {
    $response = $this->get('/api/v1/car-services');

    $response->assertStatus(200);
});

test('test post car service', function () {
    $carService = CarService::factory()->raw();

    $response = $this->post('/api/v1/car-services', $carService);

    $response->assertStatus(201)->assertJson([
        'data' => $carService
    ]);
});

test('test get car service', function () {
    $raw = CarService::factory()->raw();
    $carService = CarService::create($raw);
    
    $response = $this->get("/api/v1/car-services/{$carService->id}");

    $response->assertStatus(200)->assertJson([
        'data' => $raw
    ]);
});

test('test delete car service', function () {
    $carService = CarService::factory()->create();
    
    $response = $this->delete("/api/v1/car-services/{$carService->id}");

    $response->assertStatus(200)->assertJson([
        'data' => null
    ]);
});

test('test patch car service', function () {
    $raw = CarService::factory()->raw();
    $carService = CarService::create($raw);

    $body = [
        'owner' => 'owner1111'
    ];    
    $response = $this->patch("/api/v1/car-services/{$carService->id}", $body);

    $newCarService = array_merge($raw, $body);
    $response->assertStatus(200)->assertJson([
        'data' => $newCarService
    ]);
});

test('test put car service', function () {
    $raw = CarService::factory()->raw();
    $carService = CarService::create($raw);

    $body = [
        'id' => $carService->id,
        'name' => 'laser',
        'address' => 'kolotushkina 14',
        'owner' => 'owner11111'
    ];
    $response = $this->put("/api/v1/car-services/{$carService->id}", $body);

    $response->assertStatus(200)->assertJson([
        'data' => $body
    ]);
});

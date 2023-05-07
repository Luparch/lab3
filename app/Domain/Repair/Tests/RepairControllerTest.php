<?php

use App\Domain\Repair\Models\Repair;
use App\Domain\Car\Models\Car;
use App\Domain\CarService\Models\CarService;

uses(Tests\TestCase::class);

afterEach(function () {
    Repair::truncate();
    Car::truncate();
    CarService::truncate();
});

test('test get repairs', function () {
    $response = $this->get('/api/v1/repairs');

    $response->assertStatus(200);
});

test('test post repair', function () {
    $repair = Repair::factory()->raw();

    $response = $this->post('/api/v1/repairs', $repair);

    $response->assertStatus(400)->assertJson([
        'data' => null,
        'errors' => [
            'code' => 1,
            'message' => 'машины или автосервиса не существует'
        ]
    ]);
});

test('test get repair', function () {
    Car::factory()->create();
    CarService::factory()->create();
    $raw = Repair::factory()->raw();
    $repair = Repair::create($raw);
    
    $response = $this->get("/api/v1/repairs/{$repair->id}");

    $response->assertStatus(200)->assertJson([
            'data' => $raw
        ]
    );
});

test('test delete repair', function () {
    Car::factory()->create();
    CarService::factory()->create();
    $repair = Repair::factory()->create();
    
    $response = $this->delete("/api/v1/repairs/{$repair->id}");

    $response->assertStatus(200)->assertJson([
        'data' => null
    ]);
});

test('test patch repair', function () {
    Car::factory()->create();
    CarService::factory()->create();
    $repair = Repair::factory()->create();

    $body = [
        'issue' => 'net koles'
    ];    
    $response = $this->patch("/api/v1/repairs/{$repair->id}", $body);

    $response->assertStatus(200)->assertJson([
        'data' => [
            'id' => $repair->id,
            'car_id' => $repair->car_id,
            'car_service_id' => $repair->car_service_id,
            'issue' => 'net koles',
            'price' => $repair->price
        ]
    ]);
});

test('test put repair', function () {
    Car::factory()->create();
    CarService::factory()->create();
    $repair = Repair::factory()->create();

    $body = Repair::factory()->raw();
    $body['car_id'] = 99;
    $response = $this->put("/api/v1/repairs/{$repair->id}", $body);

    $response->assertStatus(400)->assertJson([
        'data' => null,
        'errors' => [
            'code' => 1,
            'message' => 'машины или автосервиса не существует'
        ]
    ]);
});

<?php

declare(strict_types=1);

use App\Models\User;

it("return's correct status code", function (): void {
    $user = User::factory()->create();

    $this->post(
        route('api:auth:store'), [
            'email' => $user->email,
            'password' => 'password',
        ]
    )->assertStatus(
        200
    );
});

test('validation', function (): void {
    $this->post(
        route('api:auth:store')
    )->assertInvalid([
        'email',
        'password',
    ]);
});

test('response', function (): void {
    $user = User::factory()->create();

    $this->post(
        route('api:auth:store'), [
            'email' => $user->email,
            'password' => 'password',
        ]
    )->assertJsonStructure([
        'data' => [
            'token',
        ],
    ]);
});

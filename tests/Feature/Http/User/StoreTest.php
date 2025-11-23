<?php

declare(strict_types=1);

it("return's correct status code", function (): void {
    $data = [
        'email' => 'kirilltest@gmail.com',
        'name' => 'Igor Zuyeu',
        'password' => '310320293',
        'password_confirmation' => '310320293',
    ];

    $this->post(
        route('api:users:store'), $data
    )
        ->assertStatus(
            201
        );
});

test('validation', function (): void {
    $this->post(
        route('api:users:store')
    )->assertInvalid([
        'email',
        'name',
        'password',
    ]);
});

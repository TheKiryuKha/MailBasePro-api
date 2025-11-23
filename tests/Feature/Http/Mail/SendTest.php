<?php

declare(strict_types=1);

use App\Models\User;

it("return's correct status code", function (): void {
    $data = [
        'subject' => 'subject',
        'text' => 'text',
    ];

    $this->actingAs(User::factory()->create())->post(
        route('api:mails:send'), $data
    )->assertStatus(
        200
    );
});

test('auth', function (): void {
    $data = [
        'subject' => 'subject',
        'text' => 'text',
    ];

    $this->postJson(
        route('api:mails:send'), $data
    )->assertStatus(
        401
    );
});

test('validation', function (): void {
    $this->actingAs(User::factory()->create())->post(
        route('api:mails:send')
    )->assertInvalid([
        'subject',
        'text',
    ]);
});

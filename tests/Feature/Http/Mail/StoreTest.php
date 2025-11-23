<?php

declare(strict_types=1);
use App\Models\User;

it("return's correct status code", function (): void {
    $this->actingAs(User::factory()->create())->post(
        route('api:mails:store'), ['email' => 'newmail@mail.com']
    )->assertStatus(
        201
    );
});

test('auth', function (): void {
    $this->postJson(
        route('api:mails:store'), ['email' => 'newmail@mail.com']
    )->assertStatus(
        401
    );
});

test('validation', function (): void {
    $this->actingAs(User::factory()->create())->post(
        route('api:mails:store')
    )->assertInvalid([
        'email',
    ]);
});

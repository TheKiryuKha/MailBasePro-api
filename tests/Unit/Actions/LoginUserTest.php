<?php

declare(strict_types=1);

use App\Actions\LoginUser;
use App\Models\User;
use Laravel\Sanctum\NewAccessToken;

it("return's token", function (): void {
    $user = User::factory()->create();
    $action = app(LoginUser::class);

    $token = $action->handle([
        'email' => $user->email,
        'password' => 'password',
    ]);

    expect($token)->toBeInstanceOf(NewAccessToken::class)
        ->and($token->accessToken->can('*'))->toBeTrue();
});

it('throws exception for invalid credentials', function (): void {
    $action = app(LoginUser::class);

    expect(fn () => $action->handle([
        'email' => 'nonexistent@example.com',
        'password' => 'wrongpassword',
    ]))->toThrow(Exception::class, 'Invalid credentials');
});

<?php

declare(strict_types=1);

use App\Actions\CreateUser;
use App\Models\User;

it("create's user", function (): void {
    $data = [
        'name' => 'Kiryl',
        'email' => 'slkdfjldsf@gmail.com',
        'password' => '189ueih',
    ];
    $action = app(CreateUser::class);

    $action->handle($data);

    expect(User::query()->count())->toBe(1);
    expect(User::query()->first())
        ->name->toBe($data['name'])
        ->email->toBe($data['email']);
});

it("return's User", function (): void {
    $data = [
        'name' => 'Kiryl',
        'email' => 'slkdfjldsf@gmail.com',
        'password' => '189ueih',
    ];
    $action = app(CreateUser::class);

    $user = $action->handle($data);

    expect($user)->toBeInstanceOf(User::class);
});

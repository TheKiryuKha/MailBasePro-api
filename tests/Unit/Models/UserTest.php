<?php

declare(strict_types=1);

use App\Models\Mail;
use App\Models\User;

test('to array', function (): void {
    $user = User::factory()->create()->refresh();

    expect(array_keys($user->toArray()))
        ->toBe([
            'id',
            'name',
            'email',
            'email_verified_at',
            'created_at',
            'updated_at',
        ]);
});

test('has many mails', function (): void {
    $user = User::factory()->has(Mail::factory(3))->create()->refresh();

    expect($user->mails)->toHaveCount(3)
        ->each->toBeInstanceOf(Mail::class);
});

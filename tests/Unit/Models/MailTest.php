<?php

declare(strict_types=1);
use App\Models\Mail;
use App\Models\User;

test('to array', function (): void {
    $mail = Mail::factory()->create()->refresh();

    expect(array_keys($mail->toArray()))
        ->toBe([
            'id',
            'email',
            'user_id',
            'created_at',
            'updated_at',
        ]);
});

test('belongs to User', function (): void {
    $mail = Mail::factory()->create();

    expect($mail->user)->toBeInstanceOf(User::class);
});

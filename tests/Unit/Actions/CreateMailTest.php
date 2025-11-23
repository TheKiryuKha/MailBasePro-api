<?php

declare(strict_types=1);

use App\Actions\CreateMail;
use App\Models\Mail;
use App\Models\User;

it("create's Mail", function (): void {
    $user = User::factory()->create();
    $action = app(CreateMail::class);

    $action->handle($user, 'test@mail.com');

    expect(Mail::query()->count())->toBe(1);
    expect(Mail::query()->first())
        ->email->toBe('test@mail.com')
        ->user_id->toBe($user->id);
});

it("return's Mail", function (): void {
    $user = User::factory()->create();
    $action = app(CreateMail::class);

    $email = $action->handle($user, 'test@mail.com');

    expect($email)->toBeInstanceOf(Mail::class);
});

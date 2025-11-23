<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\Mail;
use App\Models\User;

final readonly class CreateMail
{
    public function handle(User $user, string $email): Mail
    {
        return $user->mails()->create(
            ['email' => $email]
        );
    }
}

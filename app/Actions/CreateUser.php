<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\User;

final readonly class CreateUser
{
    /**
     * @param  array<string, mixed>  $attr
     */
    public function handle(array $attr): User
    {
        return User::query()->create($attr);
    }
}

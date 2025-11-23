<?php

declare(strict_types=1);

namespace App\Actions;

use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\NewAccessToken;

final readonly class LoginUser
{
    /**
     * @param  array{email: string, password: string}  $attr
     */
    public function handle(array $attr): NewAccessToken
    {
        if (!Auth::attempt($attr)) {
            throw new Exception('Invalid credentials');
        }

        /** @var User $user */
        $user = Auth::user();

        return $user->createToken($user->name, ['*']);
    }
}

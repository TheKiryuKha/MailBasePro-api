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
     * @param  array<mixed>  $attr
     */
    public function handle(array $attr): NewAccessToken
    {
        throw_unless(Auth::attempt($attr), new Exception('Invalid credentials'));

        /** @var User $user */
        $user = Auth::user();

        $user->tokens()->delete();

        return $user->createToken($user->name, ['*']);
    }
}

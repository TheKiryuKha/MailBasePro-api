<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\LoginUser;
use App\Http\Requests\LoginUserRequest;
use App\Http\Resources\TokenResource;

final readonly class AuthController
{
    public function store(LoginUserRequest $request, LoginUser $action): TokenResource
    {
        $token = $action->handle($request->validated());

        return new TokenResource($token);
    }
}

<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreateUser;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\JsonResponse;

final readonly class UserController
{
    public function store(CreateUserRequest $request, CreateUser $action): JsonResponse
    {
        $action->handle($request->validated());

        return response()->json(status: 201);
    }
}

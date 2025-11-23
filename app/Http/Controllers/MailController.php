<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\CreateMail;
use App\Http\Requests\CreateMailRequest;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Http\JsonResponse;

final readonly class MailController
{
    public function store(
        #[CurrentUser] User $user,
        CreateMail $action,
        CreateMailRequest $request
    ): JsonResponse {

        $action->handle(
            $user,
            $request->string('email')->value()
        );

        return response()->json(status: 201);
    }
}

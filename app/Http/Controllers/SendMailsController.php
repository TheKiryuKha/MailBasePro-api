<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\SendMails;
use App\Http\Requests\SendMailRequest;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Http\JsonResponse;

final readonly class SendMailsController
{
    public function __invoke(
        #[CurrentUser] User $user,
        SendMails $action,
        SendMailRequest $request
    ): JsonResponse {

        $action->handle($user, $request->validated());

        return response()->json(status: 200);
    }
}

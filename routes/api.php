<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->as('api:auth:')->group(
    base_path('routes/api/auth.php')
);

Route::prefix('users')->as('api:users:')->group(
    base_path('routes/api/user.php')
);

Route::middleware('auth:sanctum')->prefix('mails')->as('api:mails:')->group(
    base_path('routes/api/mail.php')
);

<?php

declare(strict_types=1);

use App\Actions\SendMails;
use App\Mail\BaseMail;
use App\Models\Mail as MailModel;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

it("send's emails", function (): void {
    Mail::fake();
    $user = User::factory()->create();
    MailModel::factory(3)->for($user)->create();
    $action = app(SendMails::class);

    $action->handle($user, ['subject' => 'sdlfkjdf', 'text' => 'text']);

    Mail::assertQueued(BaseMail::class, 3);
});

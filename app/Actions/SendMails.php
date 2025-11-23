<?php

declare(strict_types=1);

namespace App\Actions;

use App\Mail\BaseMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

final readonly class SendMails
{
    /**
     * @param  array{subject: string, text: string}  $attr
     */
    public function handle(User $user, array $attr): void
    {
        foreach ($user->mails as $mail) {
            Mail::to($mail->email)
                ->queue(new BaseMail(
                    $user, $attr['subject'], $attr['text']
                ));
        }
    }
}

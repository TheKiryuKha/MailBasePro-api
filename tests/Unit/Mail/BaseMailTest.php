<?php

declare(strict_types=1);

use App\Mail\BaseMail;
use App\Models\User;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

test('envelope', function (): void {
    $user = User::factory()->create();
    $mail = new BaseMail($user, 'test', 'text');

    $envelope = $mail->envelope();

    expect($envelope)->toBeInstanceOf(Envelope::class)
        ->and($envelope->subject)->toBe('test')
        ->and($envelope->from->address)->toBe($user->email)
        ->and($envelope->from->name)->toBe($user->name);
});

test('content', function (): void {
    $user = User::factory()->create();
    $subject = 'Test Subject';
    $text = 'Test email content';

    $baseMail = new BaseMail($user, $subject, $text);
    $content = $baseMail->content();

    expect($content)->toBeInstanceOf(Content::class)
        ->and($content->view)->toBe('mail');
});

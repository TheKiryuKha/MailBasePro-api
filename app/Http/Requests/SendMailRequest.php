<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

final class SendMailRequest extends FormRequest
{
    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'subject' => ['required', 'string', 'min:1', 'max:10'],
            'text' => ['required', 'string', 'min:1'],
        ];
    }

    /**
     * @param  mixed  $key
     * @param  mixed  $default
     * @return array{subject: string, text: string}
     */
    public function validated($key = null, $default = null): array
    {
        /** @var array{subject: string, text: string} $data */
        $data = parent::validated();

        return $data;
    }
}

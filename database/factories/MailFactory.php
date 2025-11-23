<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Mail;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Mail>
 */
final class MailFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email' => fake()->unique()->email(),
            'user_id' => User::factory(),
        ];
    }
}

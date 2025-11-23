<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mails', function (Blueprint $table): void {
            $table->id();

            $table->string('email')->unique();
            $table->foreignId('user_id');

            $table->timestamps();
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->bigInteger('division_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('type')->nullable();
            $table->string('AQUA')->nullable();
            $table->string('FRHPH')->nullable();
            $table->string('FNBP')->nullable();
            $table->string('FGB')->nullable();
            $table->string('AEHM')->nullable();
            $table->string('FEES')->nullable();
            $table->string('IT-CELL')->nullable();
            $table->string('ADMIN')->nullable();
            $table->string('FINANCE')->nullable();
            $table->string('ROLE')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

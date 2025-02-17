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
            $table->bigIncrements('id'); // Primary key
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('user'); // Role column, default is 'user'
            $table->boolean('is_suspended')->default(false); // false = active, true = suspended
            $table->string('suspend_reason')->nullable();
            $table->rememberToken();
            $table->timestamps(); // Includes `created_at` and `updated_at`
            $table->string('phone_number')->nullable();
            $table->string('location')->nullable();
            $table->string('gender')->nullable();
            $table->string('status')->nullable();
            $table->string('user_image')->nullable();
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

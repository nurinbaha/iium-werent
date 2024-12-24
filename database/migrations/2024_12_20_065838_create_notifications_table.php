<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_rent_requests', function (Blueprint $table) {
            $table->id(); // Primary key (bigint, auto-increment, unsigned)
            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key for user
            $table->unsignedBigInteger('item_id'); // Foreign key for item
            $table->unsignedBigInteger('owner_id')->nullable(); // Foreign key for owner
            $table->text('message'); // Message from user
            $table->enum('status', ['pending', 'approved', 'rejected', 'confirmed'])->default('pending'); // Status
            $table->date('start_date')->nullable(); // Start date for rental
            $table->date('end_date')->nullable(); // End date for rental
            $table->integer('total_days')->nullable(); // Total days of rental
            $table->decimal('total_price', 10, 2)->nullable(); // Initial price
            $table->decimal('final_price', 10, 2)->nullable(); // Final price after any adjustments
            $table->timestamps(); // created_at and updated_at

            // Indexes
            $table->index(['user_id']);
            $table->index(['item_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_rent_requests');
    }
};


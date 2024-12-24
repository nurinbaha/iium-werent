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
        Schema::create('rent_out_history', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('owner_id'); // Owner ID
            $table->unsignedBigInteger('renter_id'); // Renter ID
            $table->unsignedBigInteger('item_id'); // Item ID
            $table->date('start_date'); // Rental start date
            $table->date('end_date'); // Rental end date
            $table->enum('status', ['rented', 'returned', 'reviewed'])->default('rented'); // Status of the rental
            $table->text('renter_review')->nullable(); // Review by renter
            $table->integer('total_days'); // Total rental days
            $table->decimal('total_price', 10, 2); // Total price before adjustments
            $table->decimal('final_price', 10, 2); // Final price after adjustments
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraints
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('renter_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_history');
    }
};

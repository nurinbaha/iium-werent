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
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key for users
            $table->string('item_name'); // Name of the item
            $table->text('item_description'); // Description of the item
            $table->string('category'); // Category of the item
            $table->decimal('price', 8, 2); // Price with two decimal places
            $table->string('location'); // Location of the item
            $table->string('pickup_method'); // Pickup method
            $table->string('item_image')->nullable(); // Image of the item (nullable)
            $table->timestamps(); // Includes `created_at` and `updated_at`

            // Define foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};

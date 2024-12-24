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
            Schema::create('deleted_items', function (Blueprint $table) {
                $table->id(); // Primary key
                $table->unsignedBigInteger('item_id'); // References the original item
                $table->string('item_name');
                $table->text('item_description');
                $table->string('category');
                $table->decimal('price', 8, 2);
                $table->string('location');
                $table->string('pickup_method');
                $table->string('item_image')->nullable(); // Item image (nullable)
                $table->unsignedBigInteger('deleted_by'); // References the admin or user who deleted the item
                $table->string('reason'); // Reason for deletion
                $table->timestamps(); // Includes created_at and updated_at
        
                // Foreign key constraints
                $table->foreign('item_id')
                    ->references('id')
                    ->on('items')
                    ->onDelete('cascade'); // Delete related rows when the item is deleted
        
                $table->foreign('deleted_by')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade'); // Delete related rows when the user/admin is deleted
            });
        }
        
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deleted_items');
    }
};


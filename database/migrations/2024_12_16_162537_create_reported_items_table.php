<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reported_items', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary key
            $table->unsignedBigInteger('item_id'); // Foreign key for items
            $table->unsignedBigInteger('user_id'); // Foreign key for users
            $table->string('reason', 255); // Reason for the report
            $table->timestamps(); // Includes `created_at` and `updated_at`

            // Define foreign key constraints
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }       
    
    public function down()
    {
        Schema::dropIfExists('reported_items');
    }
    
};

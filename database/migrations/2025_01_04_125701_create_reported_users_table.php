<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reported_users', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->unsignedBigInteger('reported_user_id'); // User being reported
            $table->unsignedBigInteger('reporter_user_id'); // User who reported
            $table->string('reason'); // Reason for reporting
            $table->text('additional_notes')->nullable(); // Optional notes
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('reported_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('reporter_user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reported_users');
    }
};

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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID primary key
            $table->uuid('user_id'); // Foreign key to 'users' table
            $table->uuid('payment_method_id')->nullable(); // Foreign key to 'payment_methods' table
            $table->decimal('tax', 8, 2); // Tax amount
            $table->decimal('total', 8, 2); // Total order amount
            $table->string('coupon')->nullable(); // Coupon code applied (nullable)
            $table->enum('status', ['pending', 'processing', 'cancelled', 'completed'])->default('pending'); // Order status
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

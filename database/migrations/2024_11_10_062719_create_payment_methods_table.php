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
        Schema::create('payment_methods', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID primary key
            $table->uuid('user_id'); // Foreign key to User table
            $table->string('payment_type'); // Foreign key to PaymentType table
            $table->string('name'); // The name of the payment method (e.g., Visa, MasterCard)
            $table->string('card_number'); // The card number
            $table->string('cvv'); // The card CVV
            $table->date('expiration_date'); // Expiration date of the card
            $table->timestamps(); // created_at and updated_at
            $table->boolean('default')->default(false); // Default address flag
            // Foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};

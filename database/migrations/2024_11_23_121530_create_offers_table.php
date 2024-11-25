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
        Schema::create('offers', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID primary key
            $table->uuid('product_id'); // Foreign key for the product
            $table->decimal('new_price', 10, 2)->default(0); // New discounted price
            $table->timestamp('end_at')->nullable(); // Offer end timestamp
            $table->timestamps(); // Created at and updated at

            // Foreign key constraint
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};

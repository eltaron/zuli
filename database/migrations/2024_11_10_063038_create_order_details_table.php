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
        Schema::create('order_details', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID primary key
            $table->uuid('order_id'); // Foreign key to 'orders' table
            $table->uuid('product_id'); // Foreign key to 'packages' table
            $table->integer('quantity'); // Quantity of the package/service/sub_service
            $table->decimal('price', 8, 2); // Price of the package/service/sub_service
            $table->timestamps(); // created_at and updated_at

            // Foreign key constraints
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};

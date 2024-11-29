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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID primary key
            $table->uuid('user_id'); // Foreign key for the user
            $table->uuid('category_id'); // Foreign key for the category
            $table->text('image')->nullable(); // Nullable image field
            $table->string('title'); // Title of the product
            $table->text('description')->nullable(); // Description of the product
            $table->text('url')->nullable(); // Optional URL field
            $table->decimal('price', 10, 2)->default(0); // Product price
            $table->enum('is_top', ['yes', 'no'])->default('no'); // Is top product flag
            $table->timestamps(); // Created at and updated at

            // Foreign key constraint
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

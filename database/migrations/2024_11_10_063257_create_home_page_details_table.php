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
        Schema::create('home_page_details', function (Blueprint $table) {
            $table->uuid('id')->primary(); // UUID primary key
            $table->string('slogan')->nullable(); // Hero section main photo
            $table->string('facebook')->nullable(); // Twitter link
            $table->string('instgram')->nullable(); // Instagram link
            $table->string('behance')->nullable(); // Snapchat link
            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_details');
    }
};

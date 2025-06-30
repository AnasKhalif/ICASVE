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
        Schema::create('hotels', function (Blueprint $table) {
           $table->id();
           $table->string('name');
           $table->string('address');
           $table->string('phone');
           $table->string('email')->nullable();
           $table->string('website')->nullable();
           $table->text('description')->nullable();
           $table->decimal('rating', 2, 1)->nullable(); // Ex: 4.8
           $table->unsignedInteger('reviews_count')->default(0); // Ex: 324
           $table->unsignedTinyInteger('stars')->nullable(); // Ex: 4 or 5
           $table->string('image')->nullable();
           $table->text('map_url')->nullable();
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};

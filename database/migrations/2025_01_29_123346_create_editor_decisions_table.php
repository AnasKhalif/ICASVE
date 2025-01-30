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
        Schema::create('editor_decisions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('abstract_id')->constrained()->onDelete('cascade');
            $table->foreignId('editor_id')->constrained('users')->onDelete('cascade');
            $table->string('decision'); // Accept, Reject, Revision Required
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('editor_decisions');
    }
};

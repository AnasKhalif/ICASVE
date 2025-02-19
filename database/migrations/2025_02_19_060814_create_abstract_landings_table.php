<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('abstract_landings', function (Blueprint $table) {
            $table->id();
            $table->text('guideline'); // CKEditor content
            $table->string('pdf_template')->nullable(); // Menyimpan nama file PDF
            $table->timestamp('last_updated')->nullable();
            $table->timestamps();
        });
    }
    
    
    public function down(): void
    {
        Schema::dropIfExists('abstract_landings');
    }
};

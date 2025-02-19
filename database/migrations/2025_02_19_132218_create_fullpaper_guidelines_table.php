<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('fullpaper_guidelines', function (Blueprint $table) {
            $table->id();
            $table->year('year');
            $table->text('content'); // Untuk guideline (CKEditor)
            $table->string('pdf_file')->nullable(); // File PDF
            $table->timestamps(); // Untuk "Terakhir Diperbarui"
        });
    }

    public function down() {
        Schema::dropIfExists('fullpaper_guidelines');
    }
};

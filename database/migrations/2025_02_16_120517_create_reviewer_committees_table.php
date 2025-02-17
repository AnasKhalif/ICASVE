<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('reviewer_committees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title');
            $table->string('institution');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviewer_committees');
    }
};

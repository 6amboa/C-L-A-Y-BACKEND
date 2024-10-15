<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('course_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('curso_id')->constrained('courses')->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_categories_tables');
    }
};

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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 255);
            $table->text('descripcion')->nullable();
            $table->string('archivo_url', 255);
            $table->enum('tipo', ['documento', 'video', 'imagen', 'otro']);
            $table->timestamp('fecha_subida')->useCurrent();
            $table->foreignId('curso_id')->nullable()->constrained('courses')->onDelete('set null');
            $table->foreignId('docente_id')->nullable()->constrained('teachers')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};

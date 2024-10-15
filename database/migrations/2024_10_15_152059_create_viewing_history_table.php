<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('viewing_history', function (Blueprint $table) {
            $table->id(); // Clave primaria
            $table->unsignedBigInteger('usuario_id')->nullable(); // FK a users
            $table->unsignedBigInteger('clase_id')->nullable(); // FK a classes
            $table->timestamp('fecha_vista')->useCurrent(); // Marca de tiempo con fecha actual por defecto

            // Llaves foráneas
            $table->foreign('usuario_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('clase_id')->references('id')->on('classes')->onDelete('set null');

            // Índices adicionales
            $table->index('usuario_id');
            $table->index('clase_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viewing_history');
    }
};

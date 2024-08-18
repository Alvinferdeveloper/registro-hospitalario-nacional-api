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
        Schema::create('consultas', function (Blueprint $table) {
            $table->id();
            $table->string('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->string('personal_salud_id');
            $table->foreign('personal_salud_id')->references('id')->on('personal_salud');
            $table->date('fecha');
            $table->longText('resumen');
            $table->longText('diagnostico');
            $table->text('plan');
            $table->foreignId('atencion_centro_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};

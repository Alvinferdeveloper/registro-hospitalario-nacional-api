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
        Schema::create('medico_vacuna_pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('personal_salud_id');
            $table->foreign('personal_salud_id')->references('id')->on('personal_salud');
            $table->string('paciente_id');
            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->foreignId('vacuna_id')->constrained();
            $table->date('fecha')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medico_vacuna_pacientes');
    }
};

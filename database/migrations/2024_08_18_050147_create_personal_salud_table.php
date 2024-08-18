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
        Schema::create('personal_salud', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nombres');
            $table->string('apellidos');
            $table->date('nacimiento');
            $table->foreignId('atencion_centro_id')->constrained();
            $table->enum('area',['MEDICINA INTERNA']);
            $table->enum('tipo',['DOCTOR', 'ENFERMERO']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_salud');
    }
};

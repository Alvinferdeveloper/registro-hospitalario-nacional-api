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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('nombres');
            $table->string('apellidos');
            $table->char('cedula',16)->nullable();
            $table->string('partida_nacimiento')->nullable();
            $table->enum('tipo_sangre',['A+','A-','B+','B-','AB+', 'AB-','O+','O+']);
            $table->enum('estado_civil',['SOLTERO','CASADO','DIVORCIADO','VIUDO','UNION LIBRE']);
            $table->enum('etnia',['MESTIZO','MISKITO']);
            $table->foreignId('direccion_id')->references('id')->on('direcciones');
            $table->foreignId('salud_sistema_id')->constrained();
            $table->char('numero',8)->nullable();
            $table->string('foto',100);
            $table->date('nacimiento');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};

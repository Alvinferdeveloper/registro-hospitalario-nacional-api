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
        Schema::create('atencion_centros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('tipo',['HOSPITAL','CENTRO SALUD']);
            $table->foreignId('municipio_id')->constrained();
            $table->foreignId('salud_sistema_id')->constrained();
            $table->string('lat',100);
            $table->string('lng',100);
            $table->string('ciudad',70);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atencion_centros');
    }
};

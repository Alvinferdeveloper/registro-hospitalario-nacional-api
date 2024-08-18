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
        Schema::create('personal_salud_autoridades', function (Blueprint $table) {
            $table->string('personal_salud_id');
            $table->foreign('personal_salud_id')->references('id')->on('personal_salud');
            $table->foreignId('autoridad_id')->references('id')->on('autoridades');;
            $table->primary(['personal_salud_id','autoridad_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_salud_autoridades');
    }
};

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
        Schema::create('doctor_vaccinates_patients', function (Blueprint $table) {
            $table->id();
            $table->uuid('health_carer_id');
            $table->foreign('health_carer_id')->references('id')->on('health_carers');
            $table->uuid('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->foreignId('vaccine_id')->constrained();
            $table->date('date')->default(now());
            $table->integer('dose');
            $table->string('address')->nullable();
            $table->string('vaccine_code')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_vaccinates_patients');
    }
};

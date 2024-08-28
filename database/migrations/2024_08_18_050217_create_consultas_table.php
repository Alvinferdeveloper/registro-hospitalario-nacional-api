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
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->uuid('patient_id');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->uuid('health_carer_id');
            $table->foreign('health_carer_id')->references('id')->on('health_carers');
            $table->date('date');
            $table->longText('summary');
            $table->longText('diagnosis');
            $table->longText('plan');
            $table->uuid('attention_center_id');
            $table->foreign('attention_center_id')->references('id')->on('attention_centers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultations');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patient_plans', function (Blueprint $table) {
            $table->id();
            $table->uuid('healthCarer_id');
            $table->uuid('patient_id');
            $table->foreign('healthCarer_id')->references('id')->on('health_carers');
            $table->foreign('patient_id')->references('id')->on('patients');
            $table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('plan');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_plans');
    }
};

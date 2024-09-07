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
        Schema::create('health_carers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unique('id');
            $table->string('name');
            $table->string('identification');
            $table->string('lastName');
            $table->date('birthdate');
            $table->uuid('attention_center_id')->nullable();
            $table->foreign('attention_center_id')->references('id')->on('attention_centers');
            $table->enum('area',['MEDICINA INTERNA', 'ADMINISTRACION']);
            $table->enum('type',['DOCTOR', 'ENFERMERO',"ADMIN"]);
            $table->string('phone_number');
            $table->string('email');
            $table->string('password');
            $table->boolean('active')->default(true);
            $table->uuid('admin_creator')->nullable();
            $table->foreign('admin_creator')->references('id')->on('admins');
            $table->uuid('healthcare_system_id');
            $table->foreign('healthcare_system_id')->references('id')->on('healthcare_systems');
            $table->uuid('health_carer_creator')->nullable();
            $table->foreign('health_carer_creator')->references('id')->on('health_carers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_carers');
    }
};

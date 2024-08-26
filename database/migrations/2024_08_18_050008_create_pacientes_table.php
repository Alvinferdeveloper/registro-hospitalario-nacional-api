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
        Schema::create('patients', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('lastName');
            $table->char('identification',16)->nullable();
            $table->string('birth_certificate')->nullable();
            $table->enum('blood_type',['A+','A-','B+','B-','AB+', 'AB-','O+','O+'])->nullable();
            $table->enum('marital_status',['SOLTERO','CASADO','DIVORCIADO','VIUDO','UNION LIBRE']);
            $table->enum('gender',['M','F']);
            $table->foreignId('address_id')->constrained();
            $table->uuid('healthcare_system_id')->nullable();
            $table->foreign('healthcare_system_id')->references('id')->on('healthcare_systems');
            $table->char('phone_number',8)->nullable();
            $table->string('profile_photo')->nullable();
            $table->date('birthdate');
            $table->enum('role',['USER'])->default('USER');
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};

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
        Schema::create('health_carer_roles', function (Blueprint $table) {
            $table->uuid('health_carer_id');
            $table->foreign('health_carer_id')->references('id')->on('health_carers');
            $table->foreignId('role_id')->constrained();
            $table->primary(['health_carer_id','role_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_carer_roles');
    }
};

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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('description', 500);
            $table->float('rate', 8, 2, true);
            $table->float('total_earnings', 10, 2, true)->default(0);
            $table->integer('patients')->default(0);
            $table->string('path');
            $table->integer('active_appointments')->default(0);
            $table->integer('total_appointments')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};

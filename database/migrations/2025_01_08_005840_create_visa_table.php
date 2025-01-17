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
        Schema::create('visa', function (Blueprint $table) {
            $table->string('idFee', 50)->primary();
            $table->string('jenisVisa', 30);
            $table->string('idCountry', 10);
            $table->decimal('fee', 15, 2);
            $table->foreign('idCountry')->references('idCountry')->on('country');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visa');
    }
};

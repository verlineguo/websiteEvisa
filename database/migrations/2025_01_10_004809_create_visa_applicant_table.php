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
        Schema::create('visa_applicant', function (Blueprint $table) {
            $table->string('idVisa', 50)->primary();
            $table->string('idApplicant', 50);
            $table->string('idFee', 50);
            $table->date('dateOfArrival');
            $table->date('dateOfDeparture');
            $table->integer('lengthOfStay');
            $table->string('prevCountry', 50)->nullable();
            $table->date('expDate')->nullable();
            $table->foreign('idApplicant')->references('idApplicant')->on('Applicant')->onDelete('cascade');
            $table->foreign('idFee')->references('idFee')->on('Visa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visa_applicant');
    }
};

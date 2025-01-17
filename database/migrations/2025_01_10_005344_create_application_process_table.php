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
        Schema::create('application_process', function (Blueprint $table) {
            $table->id();
            $table->string('noAppProcess', 8)->primary();
            $table->string('idEmp', 50);
            $table->string('idVisa', 50);
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->string('idStat', 10);
            $table->foreign('idEmp')->references('idEmp')->on('employee')->onDelete('cascade');
            $table->foreign('idVisa')->references('idVisa')->on('visa_applicant');
            $table->foreign('idStat')->references('idStat')->on('status')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_application_process');
    }
};

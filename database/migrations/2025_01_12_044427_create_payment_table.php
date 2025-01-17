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
        Schema::create('payment', function (Blueprint $table) {
            $table->string('idPayment', 50)->primary();
            $table->string('idVisa', 50);
            $table->decimal('amount', 15, 2);
            $table->dateTime('paymentDate');
            $table->boolean('paymentStatus');
            $table->foreign('idVisa')->references('idVisa')->on('visa_applicant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};

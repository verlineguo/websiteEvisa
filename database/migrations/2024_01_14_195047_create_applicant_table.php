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
        Schema::create('applicant', function (Blueprint $table) {
            $table->string('idApplicant', 50)->primary();
            $table->string('name', 100);
            $table->string('username', 50)->unique();
            $table->string('password', 255);
            $table->date('dob')->nullable();
            $table->string('phoneNo', 15)->nullable();
            $table->string('emailAddress', 50)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('motherName', 50)->nullable();
            $table->string('gender', 25)->nullable();
            $table->string('profession', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicant');
    }
};

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
        Schema::create('employee', function (Blueprint $table) {
            $table->string('idEmp', 50)->primary();
            $table->string('name', 100);
            $table->string('username', 50);
            $table->string('password', 255);
            $table->string('role', 10);
            $table->date('dob');
            $table->string('phoneNo', 15);
            $table->string('emailAddress', 50);
            $table->string('address', 100);
            $table->string('gender', 25);
            $table->foreign('role')->references('idRole')->on('role');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_employee');
    }
};

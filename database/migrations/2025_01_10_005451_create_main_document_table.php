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
        Schema::create('main_document', function (Blueprint $table) {
            $table->string('documentNo', 10)->primary();
            $table->string('idApplicant', 50);
            $table->string('documentType', 10);
            $table->string('filePath', 200);
            $table->dateTime('uploadedDate');
            $table->foreign('idApplicant')->references('idApplicant')->on('applicant')->onDelete('cascade');
            $table->foreign('documentType')->references('idDoc')->on('doc_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_main_document');
    }
};

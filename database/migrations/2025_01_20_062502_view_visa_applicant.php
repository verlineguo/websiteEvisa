<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW View_visaApplicant AS
            SELECT 
                a.name,              
                v.jenisVisa,
                va.dateOfArrival,
                va.dateOfDeparture,
                va.lengthOfStay,
                va.prevCountry,
                va.expDate
            FROM 
                Applicant a
            JOIN 
                visa_applicant va ON a.idApplicant = va.idApplicant
            INNER JOIN 
                visa v ON va.idFee = v.idFee;
        ");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

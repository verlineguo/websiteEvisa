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
            CREATE VIEW view_VisaDetail AS
            SELECT 

                a.name AS ApplicantName,
                a.dob AS DateOfBirth,
                v.jenisVisa AS VisaType,
                c.countryName AS destinationCountry,
                v.fee AS VisaFee,
                va.dateOfArrival AS ArrivalDate,
                va.dateOfDeparture AS DepartureDate,
                va.lengthOfStay AS LengthOfStay,
                va.prevCountry AS PreviousCountry,
                va.expDate AS ExpirationDate

            FROM 
                visa_applicant va
            INNER JOIN 
                applicant a ON va.idApplicant = a.idApplicant
            INNER JOIN 
                visa v ON va.idFee = v.idFee
            INNER JOIN 
                country c ON v.idCountry = c.idCountry


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

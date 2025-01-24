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
        DB::statement(
            "
            CREATE VIEW View_PaymentDetails AS
            SELECT 
                p.idPayment,
                a.name AS ApplicantName,
                v.jenisVisa AS VisaType,
                p.amount,
                p.paymentDate,
                p.paymentStatus
            FROM Payment p
            JOIN visa_applicant va ON p.idVisa = va.idVisa
            JOIN Applicant a ON va.idApplicant = a.idApplicant
            JOIN Visa v ON va.idFee = v.idFee
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

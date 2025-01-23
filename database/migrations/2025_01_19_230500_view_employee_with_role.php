<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("
            CREATE VIEW View_employeeWithRole AS
            SELECT 
                e.idEmp AS idEmp,
                e.name AS EmployeeName,
                r.roleName AS Role,
                e.phoneNo,
                e.emailAddress,
                e.address
            FROM employee e
            LEFT JOIN role r ON e.role = r.idRole
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS View_employeeWithRole');

    }
};

<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Role;


class EmployeeController extends Controller
{
    public function index()
    {
        $employeesWithRole = DB::table('View_employeeWithRole')->get();
        return view('admin.employee.index', compact('employeesWithRole'));
    }
    
    public function create()
    {
        $roles = Role::all(); 
        return view('admin.employee.form', ['role' => $roles]);
    }

    public function save(request $request)
    {
        
        DB::statement('EXEC SP_createEmployee ?, ?, ?, ?, ?, ?, ?, ?, ?', [
            $request->name,
            $request->username,
            bcrypt($request->password),
            $request->role,
            $request->dob,
            $request->phoneNo,
            $request->address,
            $request->emailAddress,
            $request->gender,
        ]);
        return redirect()->route('admin.employee.index')->with('success', 'Employee added successfully.');

    }
    public function edit($idEmp)
    {
        $role = Role::all();
        $employee = Employee::with('role')->find($idEmp); 
        return view('admin.employee.form', ['employee' => $employee, 'role' => $role]);
    }

    public function update(Request $request, $idEmp)
    {
        DB::statement('EXEC SP_updateEmployee ?, ?, ?, ?, ?, ?, ?, ?, ?, ?', [
            $idEmp,
            $request->name,
            $request->username,
            bcrypt($request->password),
            $request->role,
            $request->dob,
            $request->phoneNo,
            $request->address,
            $request->emailAddress,
            $request->gender,
        ]);

        return redirect()->route('admin.employee.index')->with('success', 'Employee updated successfully.');
    }
    public function delete($idEmp)
    {
        DB::statement('EXEC SP_deleteEmployee ?', [$idEmp]);
        return redirect()->route('admin.employee.index')->with('success', 'Employee deleted successfully.');
    }

    // Controller method
    

    
}

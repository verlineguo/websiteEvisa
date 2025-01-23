<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeAuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');
        if (Auth::guard('employee')->attempt($credentials)) {
            $request->session()->regenerate();
            $employee = Auth::guard('employee')->user(); // Get the authenticated employee
            if ($employee->role == 1) { // idRole 1 untuk admin
                return redirect()->route('admin.dashboard');
            } elseif ($employee->role == 2) { // idRole 2 untuk consultant
                return redirect()->route('consultant.dashboard');
            }

            return redirect('/')->with('error', 'Role tidak dikenali.');
        } 

        return redirect()->back()->with('error', 'Username atau password salah.');

    }

    public function logout()
    {
        Auth::guard('employee')->logout(); // Use the employee guard for logout
        request()->session()->invalidate();
        request()->session()->regenerate();
        return redirect()->to('/');
    }
}

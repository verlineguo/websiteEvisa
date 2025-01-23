<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< Updated upstream
use Illuminate\Support\Facades\Validator;
use App\Models\Applicant;
use Illuminate\Support\Facades\DB;

class CustomerAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth/customerRegister');
    }
    public function showLoginForm()
    {
        return view('auth/customerLogin');
    }

    public function register(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:applicant,username',
            'password' => 'required|min:6|confirmed',
        ])->validate();

        DB::statement('EXEC SP_createApplicant ?, ?, ?, ?, ?, ?, ?, ?, ?, ?', [
            $request->name,
            $request->username,
            bcrypt($request->password),  
            null,
            null,
            null,
            null,
            null,
            null,
            null,
        ]);
        return redirect()->route('applicant.login')->with('success', 'Registrasi berhasil. Silakan login.');



    }
    public function login(Request $request)
    {
        Validator::make($request->all(), [
			'username' => 'required|string',
			'password' => 'required'
		])->validate();

        $credentials = $request->only('username', 'password');
        if (Auth::guard('customer')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('applicant.home')->with('success', 'Login berhasil.');
        }
=======

class CustomerAuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }
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
>>>>>>> Stashed changes

        return redirect()->back()->with('error', 'Username atau password salah.');

    }

    public function logout()
    {
<<<<<<< Updated upstream
        Auth::guard('customer')->logout(); 
=======
        Auth::guard('employee')->logout(); // Use the employee guard for logout
>>>>>>> Stashed changes
        request()->session()->invalidate();
        request()->session()->regenerate();
        return redirect()->to('/');
    }
}

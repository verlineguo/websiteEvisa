<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function index() 
    // {
    //     $user = Auth::user();
    //     dd($user);
    //     // Periksa role pengguna
    //     if ($user->role == 1) { // Role 1 untuk admin
    //         return view('admin.dashboard');
    //     } elseif ($user->role == 2) { // Role 2 untuk consultant
    //         return view('consultant.dashboard');
    //     } else {
    //         return view('admin.dashboard');
    //     }

    //     return redirect()->route('login')->with('gagal', 'Role tidak dikenali.');
    // }
    public function adminDashboard()
    {
        

        return view('admin.dashboard');
    }

    // Method untuk consultant dashboard
    public function consultantDashboard()
    {
        
        return view('consultant.dashboard');
    }

    
}

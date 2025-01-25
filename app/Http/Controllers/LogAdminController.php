<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogAdminController extends Controller
{
    
    public function index()
    {
        $logAdmin = DB::table('View_LogAdmin')->get();

        return view('admin.logadmin.index', ['logAdmin' => $logAdmin]);
    }
}

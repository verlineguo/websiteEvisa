<?php

namespace App\Http\Controllers;

use App\Models\ApplicationProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ApplicationProcessController extends Controller
{
    public function index() 
    {
        $process = ApplicationProcess::all()->toArray();; 
        return view('admin.ApplicationProcess.index', ['process' => $process]);
    }
    public function create()
    {
        return view('admin.ApplicationProcess.form');
    }

    
}

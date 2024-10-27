<?php

namespace App\Http\Controllers;

use App\Models\Jam; // Pastikan model Product sudah di-import

class DashboardController extends Controller
{
    public function index()
    {
        $Jams = Jam::all();
    
        return view('dashboard', compact('Jams' ));
    }
    }

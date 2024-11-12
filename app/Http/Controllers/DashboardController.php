<?php

namespace App\Http\Controllers;

use App\Models\Guitar; // Pastikan model Product sudah di-import

class DashboardController extends Controller
{
    public function index()
    {
        $guitars = Guitar::all();
    
        return view('dashboard', compact('guitars' ));
    }
    }

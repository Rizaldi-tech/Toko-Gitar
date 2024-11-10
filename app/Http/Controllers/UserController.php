<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //untuk view
    public function index()
    {
    
        return view('home');
    }
    //untuk logout
    public function logout() {
        Auth::logout();
        return redirect('home');
    }
 //untuk registrasi
    public function register (Request $request) {
        $incomingfields = $request->validate([
            'name' => 'required',
            'email' => 'required','email',
            'password' => 'required'
        ]);
        $incomingfields['password'] = bcrypt($incomingfields['password']);
        $user = User::create($incomingfields);
        Auth::login($user);
        return redirect('home');
    }

    //untuk login
    public function login(Request $request)
    {
        $incomingfields = $request->validate([
            'loginname' => 'required',
            'loginpassword' => 'required'
        ]);
    
        if (Auth::attempt(['name' => $incomingfields['loginname'], 'password' => $incomingfields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('dashboard');
        }
    
        // Jika login gagal, tampilkan pesan error
        return back()->withErrors([
            'loginError' => 'Nama atau password salah. Silakan coba lagi.',
        ]);
    }
        }

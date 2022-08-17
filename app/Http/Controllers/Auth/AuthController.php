<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request) {

        $credentials = request(['username', 'password']);
        $request->validate([
             'username' => 'required|string',
             'password' => 'required|string',
        ]
        );

        if (Auth::attempt($credentials))
        {
            $request->session()->put('name', Auth::user()->name);
            return redirect()->route('admin.dashboard');
        }
        else{
            return redirect()->route('login')->with('error', 'Username atau password salah !' );
        }

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login', [
            'title' => 'Login',
        ]);
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            Alert::success('Login berhasil!');
            return redirect('/dashboard');

        }
        Alert::error('Username atau Password salah!');
        return back();
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'username' => 'required|max:255',
            'password' => 'required|max:255',
        ]);
        $validatedData['password'] = Hash::make($request->password);

        User::create($validatedData);

        Alert::success('Anda berhasil melakukan registrasi!');
        return redirect('/login');
    }
}

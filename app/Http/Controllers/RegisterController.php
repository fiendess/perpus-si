<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|max:20|unique:users,name',
            'password' => 'required|min:8',
        ], [
            'name.unique' => 'Username sudah digunakan, silakan pilih username lain.', 
        ]);


        User::create([
            'name' => $validatedData['name'],
            'password' => bcrypt($validatedData['password']), 
        ]);

        return redirect('/')->with('success', 'Registrasi berhasil! Silahkan login.');
    }
}

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
            'name' => 'required|max:255',
            'password' => 'required|min:8',
        ]);

        
        user::create([
            'name' => $validatedData['name'],
            'password' => bcrypt($validatedData['password']),
        ]);


        return redirect('/')->with('success', 'Registrasi berhasil! Silahkan login');
    }
}

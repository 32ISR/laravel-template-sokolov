<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        // валидуем запрос челика на 3 поля

        $data = $request->validate([
            'name' => 'required|min:3|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);
        
        $user = User::create([
            ...$data,
            'password' => bcrypt($data['password'])
        ]);

        Auth::login($user);
        return redirect()->route('dashboard');
    }
}

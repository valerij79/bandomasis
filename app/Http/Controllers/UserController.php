<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validuoti ir saugoti naujo vartotojo duomenis
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Registracija sėkminga.');
    }

    public function login(Request $request)
    {
        // Patikrinti ir autentikuoti vartotojo prisijungimo duomenis
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            // Prisijungimas sėkmingas
            return redirect()->intended('/')->with('success', 'Prisijungimas sėkmingas.');
        }

        return redirect()->back()->with('error', 'Neteisingi prisijungimo duomenys.');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('home')->with('success', 'Atsijungta sėkmingai.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('inicio');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'usuario'  => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $identificador = trim($request->input('usuario'));

        $user = User::where('activo', true)
            ->where(function ($query) use ($identificador) {
                $query->where('email', $identificador)
                      ->orWhere('email', 'like', $identificador . '@%')
                      ->orWhere('curp', $identificador)
                      ->orWhere('nombre', $identificador)
                      ->orWhere('id', $identificador);
            })
            ->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            Auth::login($user);
            $request->session()->regenerate();
            return redirect()->intended(route('inicio'));
        }

        return back()->withErrors([
            'usuario' => 'Credenciales inválidas o cuenta inactiva.',
        ])->onlyInput('usuario');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Muestra el formulario de login
    public function loginForm()
    {
        return view('login');
    }

    // Muestra el formulario de registro
    public function registroForm()
    {
        return view('registro');
    }

    // Guarda el usuario nuevo
    public function registro(Request $request)
    {
        $data = $request->validate([
            'nombre'   => 'required',
            'email'    => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Guardamos la contraseña cifrada
        $data['password'] = Hash::make($data['password']);
        $usuario = Usuario::create($data);

        Auth::login($usuario);
        return redirect()->route('ce.consultar');
    }

    // Comprueba email y contraseña
    public function login(Request $request)
    {
        $datos = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($datos)) {
            $request->session()->regenerate();
            return redirect()->route('ce.consultar');
        }

        return back()->withErrors(['email' => 'Email o contraseña incorrectos']);
    }

    // Cierra la sesión
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
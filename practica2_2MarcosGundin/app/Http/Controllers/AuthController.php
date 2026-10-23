<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Muestra el formulario de login (ruta "/")
    public function f_index()
    {
        return view('login');
    }

    // Muestra el formulario de registro
    public function f_registro()
    {
        return view('registro');
    }

    // Guarda el usuario nuevo
    public function f_registro_guardar(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Guardamos la contraseña cifrada
        $data['password'] = Hash::make($data['password']);
        $usuario = User::create($data);

        Auth::login($usuario);
        return redirect()->route('ce.consultar');
    }

    // Comprueba email y contraseña
    public function f_login(Request $request)
    {
        $datos = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($datos, $request->boolean('recordar'))) {
            $request->session()->regenerate();
            return redirect()->route('ce.consultar');
        }

        return back()->withErrors(['email' => 'Email o contraseña incorrectos']);
    }

    // Cierra la sesión
    public function f_logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('despedida', 'Has cerrado sesión correctamente. ¡Hasta pronto!');;
    }
}
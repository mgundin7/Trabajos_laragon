<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // LISTADO
    public function index()
    {
        $usuarios = User::orderBy('id')->get();
        return view('usuarios', compact('usuarios'));
    }

    // FORMULARIO DE CREAR (registreadmin, con desplegable de rol)
    public function create()
    {
        return view('registreadmin');
    }

    // GUARDAR NUEVO
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6|confirmed',
            'rol'      => ['required', Rule::in(['usuari', 'admin'])],
        ]);

        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return redirect()->route('usuarios.index')->with('ok', 'Usuario creado correctamente');
    }

    // FORMULARIO DE MODIFICAR
    public function edit(User $usuario)
    {
        return view('editarusuario', compact('usuario'));
    }

    // GUARDAR MODIFICACIÓN
    public function update(Request $request, User $usuario)
    {
        $data = $request->validate([
            'name'     => 'required',
            'email'    => ['required', 'email', Rule::unique('usuarios', 'email')->ignore($usuario->id)],
            'password' => 'nullable|min:6|confirmed',
            'rol'      => ['required', Rule::in(['usuari', 'admin'])],
        ]);

        // Un admin no puede quitarse a sí mismo el rol (se quedaría sin acceso al CRUD)
        if ($usuario->id === Auth::id() && $data['rol'] !== 'admin') {
            return back()->withErrors(['rol' => 'No puedes quitarte a ti mismo el rol de admin']);
        }

        // Si la contraseña viene vacía, no se cambia
        if (empty($data['password'])) {
            unset($data['password']);
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        $usuario->update($data);

        return redirect()->route('usuarios.index')->with('ok', 'Usuario modificado correctamente');
    }

    // BORRAR
    public function destroy(User $usuario)
    {
        if ($usuario->id === Auth::id()) {
            return back()->withErrors(['borrar' => 'No puedes borrarte a ti mismo']);
        }

        $usuario->delete();

        return redirect()->route('usuarios.index')->with('ok', 'Usuario borrado correctamente');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\revisiones;
use App\Models\tpracticamarcos;
use Illuminate\Http\Request;

class controladorrevisiones extends Controller
{
    public function f_consultar()
    {
        $dades = revisiones::with('coche')->orderBy('fecha', 'desc')->get();
        return view('consultarrevision', compact('dades'));
    }

    // Formulario para añadir una revisión (solo admin)
    public function f_formulari()
    {
        $coches = tpracticamarcos::all();
        return view('insertarrevision', compact('coches'));
    }

    // Guarda la revisión (solo admin)
    public function f_insert(Request $request)
    {
        $data = $request->validate([
            'matricula'   => 'required|exists:tpracticamarcos,matricula',
            'fecha'       => 'required|date',
            'descripcion' => 'required|max:255',
            'precio'      => 'required|numeric|min:0|max:9999999',
        ]);

        revisiones::create($data);

        return redirect()->route('revisiones.consultar')->with('ok', 'Revisión añadida correctamente');
    }
}
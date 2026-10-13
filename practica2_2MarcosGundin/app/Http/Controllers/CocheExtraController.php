<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CocheExtraController extends Controller
{
    // CONSULTAR: junta las tres tablas
    public function consultartaules()
    {
        $relaciones = DB::table('coche_extras')
            ->join('tpracticamarcos', 'tpracticamarcos.matricula', '=', 'coche_extras.matricula')
            ->join('extras', 'extras.id_extra', '=', 'coche_extras.id_extra')
            ->select('tpracticamarcos.matricula', 'tpracticamarcos.marca', 'tpracticamarcos.modelo',
                     'extras.nombre as extra', 'extras.precio')
            ->get();

        return view('consultartaules', compact('relaciones'));
    }

    // INSERTAR (formulario)
    public function insertarextras()
    {
        $coches = DB::table('tpracticamarcos')->get();
        $extras = DB::table('extras')->get();

        return view('insertarextras', compact('coches', 'extras'));
    }

    // INSERTAR (guardar)
    public function guardarextras(Request $request)
    {
        $request->validate([
            'matricula' => 'required|exists:tpracticamarcos,matricula',
            'id_extra'  => 'required|exists:extras,id_extra',
        ]);

        DB::table('coche_extras')->insertOrIgnore([
            'matricula' => $request->matricula,
            'id_extra'  => $request->id_extra,
        ]);

        return redirect()->route('ce.consultar')->with('ok', 'Extra asignado al coche');
    }
}
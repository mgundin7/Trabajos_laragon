<?php

namespace App\Http\Controllers;

use App\Models\Producte;
use Illuminate\Http\Request;

class ProducteController extends Controller
{
// Mostrar todos los productos
    public function index()
    {
        return response()->json(Producte::all());
    }

    // Mostrar un producto concreto
    public function show($id)
    {
        $producte = Producte::findOrFail($id);

        return response()->json($producte);
    }

    // Crear un producto
    public function store(Request $request)
    {
        $datos = $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        $producte = Producte::create($datos);

        return response()->json($producte, 201);
    }

    // Actualizar un producto
    public function update(Request $request, $id)
    {
        $producte = Producte::findOrFail($id);

        $datos = $request->validate([
            'nombre' => 'sometimes|required|string|max:255',
            'precio' => 'sometimes|required|numeric|min:0',
            'stock' => 'sometimes|required|integer|min:0'
        ]);

        $producte->update($datos);

        return response()->json($producte);
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $producte = Producte::findOrFail($id);

        $producte->delete();

        return response()->json([
            'mensaje' => 'Producto eliminado correctamente'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriaController extends Controller
{
     public function store(Request $request)
    {
        //validacion
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'nullable',
        ]);

        //creacion de la categoria
        $categoria = Categoria::create($request->all());
        
        return response()->json([
            'message' => 'Categoria creada exitosamente',
            'categoria' => $categoria
        ], 201);
    }
    public function show(string $id)
    {
        //
        $categoria = Categoria::find($id);
        if (!$categoria) {
            return response()->json(
                ['message' => 'Categoria no encontrada'
                ],404);
        }
        return response()->json($categoria,200);
    }
}

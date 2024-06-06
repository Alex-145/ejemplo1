<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonitaController extends Controller
{
    public function index()
    {
        $personas = Persona::all();
        return response()->json($personas);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'ape_paterno' => 'required',
            'ape_materno' => 'required',
            'dni' => 'required',
            'fe_nacimiento' => 'required',
            'es_civil' => 'required',
            'sexo' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'direccion' => 'required',
            'es_persona' => 'required',
            'fa_parentesco' => 'nullable',
            'parentesco' => 'nullable',
        ]);

        $persona = Persona::create($request->all());

        return response()->json($persona, 201);
    }

    public function show($id)
    {
        $persona = Persona::find($id);

        if (is_null($persona)) {
            return response()->json(['message' => 'Persona not found'], 404);
        }

        return response()->json($persona);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'ape_paterno' => 'required',
            'ape_materno' => 'required',
            'dni' => 'required',
            'fe_nacimiento' => 'required',
            'es_civil' => 'required',
            'sexo' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'direccion' => 'required',
            'es_persona' => 'required',
            'fa_parentesco' => 'nullable',
            'parentesco' => 'nullable',
        ]);

        $persona = Persona::find($id);

        if (is_null($persona)) {
            return response()->json(['message' => 'Persona not found'], 404);
        }

        $persona->update($request->all());

        return response()->json($persona);
    }

    public function destroy($id)
    {
        $persona = Persona::find($id);

        if (is_null($persona)) {
            return response()->json(['message' => 'Persona not found'], 404);
        }

        $persona->delete();
        return response()->json(null, 204);
    }
}

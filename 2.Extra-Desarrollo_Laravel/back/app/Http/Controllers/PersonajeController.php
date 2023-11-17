<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personaje;

class PersonajeController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'status' => 'required',
            'species' => 'required',
        ]);

        Personaje::create($data);

        return response()->json(['message' => 'Personaje guardado correctamente']);
    }

    public function index()
    {
        $personajes = Personaje::all();
        return view('personajes', compact('personajes'));
    }


}

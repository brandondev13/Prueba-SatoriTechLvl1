<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personaje;

class PersonajeController extends Controller
{
    public function store(Request $request)
    {
        $personaje = new Personaje();
        $personaje->name = $request->input('name');
        $personaje->status = $request->input('status');
        $personaje->species = $request->input('species');

        $personaje->save();

        return response()->json(['message' => 'Personaje guardado exitosamente'], 200);
    }

    public function index()
    {
        $personajes = Personaje::all();
        return view('personajes', compact('personajes'));
    }


}

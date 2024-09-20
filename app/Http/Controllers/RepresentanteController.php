<?php

namespace App\Http\Controllers;

use App\Models\Representante;
use Illuminate\Http\Request;

class RepresentanteController extends Controller
{
    public function index()
    {
        $representantes = Representante::with('cidade')->paginate(10);
        return response()->json($representantes);
    }

    public function show($id)
    {
        $representante = Representante::with('clientes')->find($id);
        if (!$representante) {
            return response()->json(['error' => 'Representante não encontrado'], 404);
        }
        return response()->json($representante);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:100',
            'cidade_id' => 'required|exists:cities,id'
        ]);

        $representante = Representante::create($validatedData);
        return response()->json($representante, 201);
    }

    public function update(Request $request, $id)
    {
        $representante = Representante::find($id);
        if (!$representante) {
            return response()->json(['error' => 'Representante não encontrado'], 404);
        }

        $validatedData = $request->validate([
            'nome' => 'sometimes|string|max:100',
            'cidade_id' => 'sometimes|exists:cities,id'
        ]);

        $representante->update($validatedData);
        return response()->json($representante);
    }

    public function destroy($id)
    {
        $representante = Representante::find($id);
        if (!$representante) {
            return response()->json(['error' => 'Representante não encontrado'], 404);
        }

        $representante->delete();
        return response()->json(['message' => 'Representante deletado com sucesso']);
    }
}
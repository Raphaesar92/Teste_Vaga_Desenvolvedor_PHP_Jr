<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    public function index()
    {
        $cidades = Cidade::with('representantes')->get();
        return response()->json($cidades);
    }

    public function show($id)
    {
        $cidade = Cidade::with('clientes', 'representantes')->find($id);
        if (!$cidade) {
            return response()->json(['error' => 'Cidade não encontrada'], 404);
        }
        return response()->json($cidade);
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Cidade;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        // Obter os parâmetros de busca da requisição
        $cpf = $request->input('cpf');
        $nome = $request->input('nome');
        $data_nasc = $request->input('data_nasc');
        $genero = $request->input('genero');
        $estado = $request->input('estado');
        $cidade_id = $request->input('cidade_id');

        // Query básica para buscar clientes
        $query = Cliente::query();

        // Aplicar os filtros com base nos parâmetros de busca
        if (!empty($cpf)) {
            $query->where('cpf', 'LIKE', "%$cpf%");
        }

        if (!empty($nome)) {
            $query->where('nome', 'LIKE', "%$nome%");
        }

        if (!empty($data_nasc)) {
            $query->where('data_nasc', $data_nasc);
        }

        if (!empty($genero)) {
            $query->where('genero', $genero);
        }

        if (!empty($estado)) {
            $query->where('estado', $estado);
        }

        if (!empty($cidade_id)) {
            $query->where('cidade_id', $cidade_id);
        }

        // Executar a consulta e obter os resultados paginados
        $clientes = $query->paginate(10);

        // Obter as cidades para o filtro
        $cidades = Cidade::all();

        // Retornar a view com os resultados da busca e os filtros
        return view('clientes.index', compact('clientes', 'cidades'));
    }

    public function show($id)
    {
        $cliente = Cliente::with('cidade', 'representantes')->find($id);
        if (!$cliente) {
            // return response()->json(['error' => 'Cliente não encontrado'], 404);
        }
        // return response()->json($cliente);
    }

    public function create()
    {

        $clientes = Cliente::with('cidade')->paginate(10);

        // $cidades = Cidade::all();

       // Buscando cidades distintas e ordenadas por nome
       $cidades = Cidade::select('nome', 'id')->distinct('nome')->orderBy('nome', 'asc')->get();
    
        return view('clientes.create', compact('clientes', 'cidades'));
    }

    // Método para armazenar os dados enviados do formulário
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cpf' => 'required|string|max:14|unique:clientes,cpf',
            'nome' => 'required|string|max:255',
            'data_nasc' => 'required|date',
            'genero' => 'required|string|max:1',
            'endereco' => 'nullable|string|max:255',
            'estado' => 'required|string|max:2',
            'cidade_id' => 'required|exists:cidades,id',
        ]);

        // Cria o cliente com os dados validados
        Cliente::create($validatedData);

        // Redireciona de volta para uma página, como a lista de clientes, com uma mensagem de sucesso
        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    // Método para exibir o formulário de edição de um cliente
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);  // Encontra o cliente pelo ID ou retorna 404
        $cidades = Cidade::all();  // Carrega as cidades para o select

        return view('clientes.edit', compact('cliente', 'cidades'));  // Passa os dados do cliente e cidades para a view
    }

    // Método para atualizar os dados de um cliente
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cpf' => 'required|string|max:14|unique:clientes,cpf,' . $id,  // Verifica se o CPF é único, mas ignora o cliente atual
            'nome' => 'required|string|max:255',
            'data_nasc' => 'required|date',
            'genero' => 'required|string|max:1',
            'endereco' => 'nullable|string|max:255',
            'estado' => 'required|string|max:2',
            'cidade_id' => 'required|exists:cidades,id',
        ]);

        $cliente = Cliente::findOrFail($id);  // Encontra o cliente
        $cliente->update($validatedData);  // Atualiza os dados do cliente

        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }

    public function destroy($id)
    {
        // Busca o cliente pelo ID e o deleta
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();

        // Redireciona de volta para a lista de clientes com uma mensagem de sucesso
        return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso!');
    }

    // Retorna representantes de um cliente
    public function representantes($clienteId)
    {
        // Busca o cliente pelo ID
        $cliente = Cliente::findOrFail($clienteId);

        // Retorna todos os representantes que atendem esse cliente
        $representantes = $cliente->representantes;

        return view('clientes.representantes', compact('cliente', 'representantes'));
    }
}

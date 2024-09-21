@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Formulário de Consulta -->
    <div class="card">
        <div class="card-header">
            <h4>Consulta Cliente</h4>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('clientes.index') }}">
                <div class="row">
                    <div class="col-md-3">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" class="form-control" placeholder="CPF" maxlength="14">
                    </div>
                    <div class="col-md-3">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" class="form-control" placeholder="Nome">
                    </div>
                    <div class="col-md-3">
                        <label for="data_nasc">Data Nascimento:</label>
                        <input type="date" name="data_nasc" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label for="genero">Sexo:</label><br>
                        <input type="radio" name="genero" value="M"> Masculino
                        <input type="radio" name="genero" value="F"> Feminino
                    </div>
                    <div class="col-md-3">
                        <label for="estado">Estado:</label>
                        <select name="estado" class="form-control">
                            <option value="">Todos</option>
                            <!-- Preencher com estados do Brasil -->
                            <option value="SP">SP</option>
                            <option value="RJ">RJ</option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PA">PA</option>
                            <option value="PB">PB</option>
                            <option value="PR">PR</option>
                            <option value="PE">PE</option>
                            <option value="PI">PI</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="cidade_id">Cidade:</label>
                        <select name="cidade_id" class="form-control" required>
                            <option value="">Selecione</option>
                            @foreach($cidades as $cidade)
                                <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="col-sm-4 col-md-3 button-container">
                        <button type="submit" class="btn btn-primary pesquisar">Pesquisar</button>
                        <button type="reset" class="btn btn-secondary limpar">Limpar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="container">
        <!-- Formulário de consulta de clientes -->
        
        <!-- Tabela de Resultados -->
        <div class="mt-4">
            <h4>Resultado da Pesquisa</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Cliente</th>
                        <th>CPF</th>
                        <th>Data Nasc.</th>
                        <th>Estado</th>
                        <th>Cidade</th>
                        <th>Sexo</th> 
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientes as $cliente)
                    <tr>
                    <td>
                            <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-success btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <!-- Botão para Abrir o Modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal" data-id="{{ $cliente->id }}">
                                <i class="fas fa-trash-alt"></i> Excluir
                            </button>
                        </td>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->cpf }}</td>
                        <td>{{ $cliente->data_nasc }}</td>
                        <td>{{ $cliente->estado }}</td>
                        <td>{{ $cliente->cidade->nome }}</td>
                        <td>{{ $cliente->genero == 'M' ? 'M' : 'F' }}</td> 
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Paginação -->
            {{ $clientes->links() }}
        </div>
    </div>
</div>

<!-- Modal de Confirmação -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="modal-title" id="confirmDeleteModalLabel">
                    <i class="fas fa-exclamation-circle text-warning" style="font-size: 48px;"></i>
                </h4>
                <h5 class="mt-3">Atenção!</h5>
                <p>Deseja realmente deletar este cliente?</p>

                <!-- Formulário sem a variável $cliente->id -->
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Sim</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Sucesso -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <h4 class="modal-title" id="successModalLabel"><i class="fas fa-check-circle text-success" style="font-size: 48px;"></i></h4>
                <h5 class="mt-3">Sucesso!</h5>
                <p>Ação executada com sucesso.</p>
                <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
  $(function() {
    // Quando o modal de confirmação for aberto
    $('#confirmDeleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Botão que acionou o modal
        var clientId = button.data('id'); // Extrai o ID do cliente
        var actionUrl = '/clientes/' + clientId; // Define a rota de exclusão

        // Atualiza o formulário com a ação correta
        var form = $(this).find('form'); // Encontra o formulário dentro do modal
        form.attr('action', actionUrl); // Atualiza a ação do formulário
    });
});

// Mascara CPF
$(document).ready(function() {
    // Função para aplicar a máscara de CPF
    $('#cpf').on('input', function() {
        var input = $(this);
        var value = input.val();
        
        // Remove qualquer caractere que não seja número
        value = value.replace(/\D/g, '');
        
        // Aplica a máscara de CPF
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d)/, '$1.$2');
        value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
        
        // Atualiza o campo com a máscara
        input.val(value);
    });
});
</script>
@endsection
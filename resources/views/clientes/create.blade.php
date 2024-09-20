@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Cadastro Cliente</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('clientes.store') }}">
                @csrf
                <div class="row">
                    <!-- CPF -->
                    <div class="col-md-4">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" class="form-control" placeholder="CPF" maxlength="14" required>
                    </div>

                    <!-- Nome -->
                    <div class="col-md-4">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" class="form-control" placeholder="Nome" required>
                    </div>

                    <!-- Data de Nascimento -->
                    <div class="col-md-4">
                        <label for="data_nasc">Data Nascimento:</label>
                        <input type="date" name="data_nasc" class="form-control" required>
                    </div>

                    <!-- Sexo -->
                    <div class="col-md-4 mt-3">
                        <label for="genero">Sexo:</label><br>
                        <input type="radio" name="genero" value="M" required> Masculino
                        <input type="radio" name="genero" value="F" required> Feminino
                    </div>

                    <!-- Estado -->
                    <div class="col-md-4 mt-3">
                        <label for="estado">Estado:</label>
                        <select name="estado" class="form-control" required>
                            <option value="">Selecione</option>
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
                            <!-- Adicione mais estados conforme necessário -->
                        </select>
                    </div>

                    <!-- Cidade -->
                    <div class="col-md-4 mt-3">
                        <label for="cidade_id">Cidade:</label>
                        <select name="cidade_id" class="form-control" required>
                            <option value="">Selecione</option>
                            @foreach($cidades as $cidade)
                                <option value="{{ $cidade->id }}">{{ $cidade->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Botões -->
                {{-- <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <button type="reset" class="btn btn-secondary">Limpar</button>
                </div> --}}

                  <div class="mt-3">
                    <div class="col-sm-4 col-md-3 button-container">
                        <button type="submit" class="btn btn-primary pesquisar">Salvar</button>
                        <button type="reset" class="btn btn-secondary limpar">Limpar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
/ Mascara CPF
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

 $(document).ready(function(){
        $('#cpf').mask('000.000.000-00', {reverse: true});
    });
</script>
@endsection


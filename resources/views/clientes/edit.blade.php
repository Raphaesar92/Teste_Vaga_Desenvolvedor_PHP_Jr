@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Formulário de Edição de Cliente -->
    <div class="card">
        <div class="card-header">
            <h4>Editar Cliente</h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('clientes.update', $cliente->id) }}">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <!-- CPF -->
                    <div class="col-md-4">
                        <label for="cpf">CPF:</label>
                        <input type="text" name="cpf" class="form-control" value="{{ old('cpf', $cliente->cpf) }}" maxlength="14" required>
                    </div>

                    <!-- Nome -->
                    <div class="col-md-4">
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" class="form-control" value="{{ old('nome', $cliente->nome) }}" required>
                    </div>

                    <!-- Data de Nascimento -->
                    <div class="col-md-4">
                        <label for="data_nasc">Data Nascimento:</label>
                        <input type="date" name="data_nasc" class="form-control" value="{{ old('data_nasc', $cliente->data_nasc) }}" required>
                    </div>

                    <!-- Sexo -->
                    <div class="col-md-4 mt-3">
                        <label for="genero">Sexo:</label><br>
                        <input type="radio" name="genero" value="M" {{ $cliente->genero == 'M' ? 'checked' : '' }}> Masculino
                        <input type="radio" name="genero" value="F" {{ $cliente->genero == 'F' ? 'checked' : '' }}> Feminino
                    </div>

                    <!-- Endereço -->
                    <div class="col-md-8 mt-3">
                        <label for="endereco">Endereço:</label>
                        <input type="text" name="endereco" class="form-control" value="{{ old('endereco', $cliente->endereco) }}">
                    </div>

                    <!-- Estado -->
                    <div class="col-md-4 mt-3">
                        <label for="estado">Estado:</label>
                        <select name="estado" class="form-control" required>
                            <option value="">Selecione</option>
                            <option value="SP" {{ $cliente->estado == 'SP' ? 'selected' : '' }}>SP</option>
                            <option value="RJ" {{ $cliente->estado == 'RJ' ? 'selected' : '' }}>RJ</option>
                            <option value="AC" {{ $cliente->estado == 'AC' ? 'selected' : '' }}>AC</option>
                            <option value="AL" {{ $cliente->estado == 'AL' ? 'selected' : '' }}>AL</option>
                            <option value="AP" {{ $cliente->estado == 'AP' ? 'selected' : '' }}>AP</option>
                            <option value="AM" {{ $cliente->estado == 'AM' ? 'selected' : '' }}>AM</option>
                            <option value="BA" {{ $cliente->estado == 'BA' ? 'selected' : '' }}>BA</option>
                            <option value="CE" {{ $cliente->estado == 'CE' ? 'selected' : '' }}>CE</option>
                            <option value="DF" {{ $cliente->estado == 'DF' ? 'selected' : '' }}>DF</option>
                            <option value="ES" {{ $cliente->estado == 'ES' ? 'selected' : '' }}>ES</option>
                            <option value="GO" {{ $cliente->estado == 'GO' ? 'selected' : '' }}>GO</option>
                            <option value="MA" {{ $cliente->estado == 'MA' ? 'selected' : '' }}>MA</option>
                            <option value="MT" {{ $cliente->estado == 'MT' ? 'selected' : '' }}>MT</option>
                            <option value="MS" {{ $cliente->estado == 'MS' ? 'selected' : '' }}>MS</option>
                            <option value="MG" {{ $cliente->estado == 'MG' ? 'selected' : '' }}>MG</option>
                            <option value="PA" {{ $cliente->estado == 'PA' ? 'selected' : '' }}>PA</option>
                            <option value="PB" {{ $cliente->estado == 'PB' ? 'selected' : '' }}>PB</option>
                            <option value="PR" {{ $cliente->estado == 'PR' ? 'selected' : '' }}>PR</option>
                            <option value="PE" {{ $cliente->estado == 'PE' ? 'selected' : '' }}>PE</option>
                            <option value="PI" {{ $cliente->estado == 'PI' ? 'selected' : '' }}>PI</option>
                            <option value="RN" {{ $cliente->estado == 'RN' ? 'selected' : '' }}>RN</option>
                            <option value="RS" {{ $cliente->estado == 'RS' ? 'selected' : '' }}>RS</option>
                            <option value="RO" {{ $cliente->estado == 'RO' ? 'selected' : '' }}>RO</option>
                            <option value="RR" {{ $cliente->estado == 'RR' ? 'selected' : '' }}>RR</option>
                            <option value="SC" {{ $cliente->estado == 'SC' ? 'selected' : '' }}>SC</option>
                            <option value="SE" {{ $cliente->estado == 'SE' ? 'selected' : '' }}>SE</option>
                            <option value="TO" {{ $cliente->estado == 'TO' ? 'selected' : '' }}>TO</option>
                            <!-- Adicione mais estados conforme necessário -->
                        </select>
                    </div>

                    <!-- Cidade -->
                    <div class="col-md-4 mt-3">
                        <label for="cidade_id">Cidade:</label>
                        <select name="cidade_id" class="form-control" required>
                            <option value="">Selecione</option>
                            @foreach($cidades as $cidade)
                                <option value="{{ $cidade->id }}" {{ $cliente->cidade_id == $cidade->id ? 'selected' : '' }}>
                                    {{ $cidade->nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Botões -->
                {{-- <div class="mt-4">
                    <button type="submit" class="btn btn-primary pesquisar">Salvar Alterações</button>
                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary limpar">Cancelar</a>
                </div> --}}

                   <div class="mt-3">
                    <div class="col-sm-4 col-md-3 button-container">
                        <button type="submit" class="btn btn-primary pesquisar">Salvar Alterações</button>
                        <a href="{{ route('clientes.index') }}" class="btn btn-secondary limpar">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
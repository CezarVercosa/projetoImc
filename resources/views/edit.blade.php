@extends('layouts.app')
@vite('resources/js/userFormScript.js')

@section('content')
<div class="container">
    <h2>Editar Usuário</h2>
    
    
    <!-- Formulário de edição -->
    <form action="{{ route('update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <!-- Campo Nome -->
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ old('nome', $user->nome) }}" required>
            @error('nome')
                <div class="text-danger" id="error-nome">{{ $message }}</div>
            @enderror
        </div>
        
        <!-- Campo Email -->
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            @error('email')
                <div class="text-danger" id="error-email">{{ $message }}</div>
            @enderror
        </div>
        
        <!-- Campo Telefone -->
        <div class="form-group">
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" value="{{ old('telefone', $user->telefone) }}">
            @error('telefone')
                <div class="text-danger" id="error-telefone">{{ $message }}</div>
            @enderror
        </div>

        
        <!-- Campo Peso -->
        <div class="form-group">
            <label for="peso">Peso (kg)</label>
            <input type="number" step="0.01" name="peso" id="peso" class="form-control" value="{{ old('peso', $user->peso) }}">
            @error('peso')
                <div class="text-danger" id="error-peso">{{ $message }}</div>
            @enderror
        </div>
        
        <!-- Campo Altura -->
        <div class="form-group">
            <label for="altura">Altura (m)</label>
            <input type="number" step="0.01" name="altura" id="altura" class="form-control" value="{{ old('altura', $user->altura) }}">
            @error('altura')
                <div class="text-danger" id="error-altura">{{ $message }}</div>
            @enderror
        </div>
        
        <!-- Botão de Enviar -->
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>
</div>
@endsection



@extends('layouts.app')
@vite('resources/js/userFormScript.js')


@section('title', 'Criar Novo Registro')


@section('content')

    <form action="/store" method="POST" id="create-user">
        @csrf

        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome') }}" id="nome">
            @error('nome')
                <div class="text-danger" id="error-nome">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="email">
            @error('email')
                <div class="text-danger" id="error-email">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control" value="{{ old('telefone') }}" id="telefone">
            @error('telefone')
                <div class="text-danger" id="error-telefone">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="mensagem">Mensagem:</label>
            <textarea class="form-control" id="mensagem" name="mensagem">{{ old('mensagem') }}</textarea>
            @error('mensagem')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Peso</label>
            <input type="number" step="0.01" name="peso" class="form-control" value="{{ old('peso') }}" id="peso" maxlength="5" >
            @error('peso')
                <div class="text-danger" id="error-peso">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Altura</label>
            <input type="number" step="0.01" name="altura" class="form-control" value="{{ old('altura') }}" id="altura" maxlength="5">
            @error('altura')
                <div class="text-danger" id="error-altura">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

@endsection


@extends('layouts.app')
@vite('resources/js/userFormScript.js')

@section('title', 'Listagem de Usuários')

@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
@endif

@section('content')
    @if ($users->isEmpty())
        <p>Nenhum usuário encontrado.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Mensagem</th>
                    <th>Peso</th>
                    <th>Altura</th>
                    <th>IMC</th>
                    <th>Situação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->nome }}</td>
                        <td>{{ $user->email }}</td>
                        <td><span class="phone-format">{{ $user->telefone }}</span></td>
                        <td>{{ $user->mensagem}}</td>
                        <td>{{ $user->peso }}</td>
                        <td>{{ $user->altura }}</td>
                        <td>{{ round($user->peso / ($user->altura * $user->altura), 2) }}</td>
                        <td>
                            @php
                            $imc = $user->peso / ($user->altura * $user->altura);
                            if ($imc < 18.5) {
                                echo "Abaixo do peso";
                            } elseif ($imc < 24.9) {
                                echo "Peso normal";
                            } elseif ($imc < 29.9) {
                                echo "Sobrepeso";
                            } else {
                                echo "Obesidade";
                            }
                            @endphp
                        </td>
                        <td>
                            <a href="/edit/{{ $user->id }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Navegação de paginação -->
        <div class="custom-pagination">
            {{ $users->links() }}
        </div>
        
    @endif
@endsection


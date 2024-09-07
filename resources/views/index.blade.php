@extends('layouts.app')

@section('title', 'Página Inicial')

@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
@endif

@section('content')
    <h1>Bem-vindo à Página Inicial</h1>
    <p>Desenvolvido por Antonio Cezar.</p>
@endsection

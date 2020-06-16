@extends('layouts.app')

@section('title', '- Lista de Contatos')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row no-gutters justify-content-end">
                <p>
                    <a class="btn btn-primary" href="/contacts/new" role="button">+ Criar Contato</a>
                </p>
            </div>
            <div class="card">
                <div class="card-header">Lista de Contatos</div>
                <div class="card-body">
                    @if (count($contacts) > 0)
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                            <tr>
                                <th scope="row">{{ $contact->id }}</th>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td><a href="#">Editar</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>Nenhum contato encontrado.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

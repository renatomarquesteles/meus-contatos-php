@extends('layouts.app')

@section('title', 'Lista de Contatos')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row no-gutters justify-content-end">
                <p>
                    <a
                        class="btn btn-primary"
                        href="/contacts/new"
                        role="button"
                    >
                    + Criar Contato
                    </a>
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
                            <tr
                                role="button"
                                data-toggle="modal"
                                data-target="#contactModal"
                                data-name="{{ $contact->name }}"
                                data-email="{{ $contact->email }}"
                                data-phone="{{ $contact->phone }}"
                                data-zipcode="{{ $contact->address->zipcode }}"
                                data-street="{{ $contact->address->street }}"
                                data-number="{{ $contact->address->number }}"
                                data-complement="{{ $contact->address->complement ?? '' }}"
                                data-neighborhood="{{ $contact->address->neighborhood }}"
                                data-city="{{ $contact->address->city }}"
                                data-state="{{ $contact->address->state }}"
                            >
                                <th scope="row">{{ $contact->id }}</th>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>
                                    <div class="d-flex">
                                        <a
                                            id="editContactBtn"
                                            class="btn btn-outline-secondary btn-sm"
                                            href="/contacts/{{ $contact->id }}/edit"
                                        >
                                        Editar
                                        </a>
                                        <form
                                            action="/contacts/{{ $contact->id }}"
                                            method="POST"
                                        >
                                            @method('DELETE')
                                            @csrf
                                            <button
                                                id="removeContactBtn"
                                                class="btn btn-outline-danger btn-sm ml-2"
                                                type="submit"
                                            >
                                            Remover
                                            </button>
                                        </form>
                                    </div>
                                </td>
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
<div id="contactModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button
                    type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close"
                >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Contato</strong></p>
                <p><span id="phone"></span></p>
                <p><span id="email"></span></p>
                <hr />
                <p><strong>Endereço</strong></p>
                <p>CEP: <span id="zipcode"></span></p>
                <p>Rua: <span id="street"></span>, <span id="number"></span></p>
                <p id="complement"></p>
                <p>Bairro: <span id="neighborhood"></span></p>
                <p>Cidade: <span id="city"></span> - <span id="state"></span></p>
            </div>
        </div>
    </div>
</div>
@endsection

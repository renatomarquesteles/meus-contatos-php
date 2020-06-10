@extends('layouts.app')

@section('title', '- Lista de Contatos')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de Contatos</div>

                <div class="card-body">
                    @forelse ($contacts as $contact)
                        <p>{{ $contact->name }}</p>
                    @empty
                        <p>Nenhum contato encontrado.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

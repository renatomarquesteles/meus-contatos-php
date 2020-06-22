@extends('layouts.app')

@section('title', 'Criar Contato')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Criar novo contato</div>

                <div class="card-body">
                    <form action="/contacts/{{ $contact->id }}" method="POST">
                        @method('PUT')
                        @csrf
                        <p><strong>Dados pessoais</strong></p>
                        <div class="form-group">
                            <label for="name">Nome completo*</label>
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                placeholder="Ex.: John Doe"
                                value="{{ $contact->name ?? '' }}"
                                required
                            />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail*</label>
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                placeholder="Ex.: nome@exemplo.com"
                                value="{{ $contact->email ?? '' }}"
                                required
                            />
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefone/Celular*</label>
                            <input
                                type="text"
                                class="form-control  @error('phone') is-invalid @enderror"
                                id="phone"
                                name="phone"
                                placeholder="Ex.: (00) 0000-0000 ou (00) 00000-0000"
                                autocomplete="off"
                                value="{{ $contact->phone ?? '' }}"
                                required
                            />
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr />

                        <p><strong>Endereço</strong></p>
                        <div class="form-group">
                            <label for="zipcode">CEP*</label>
                            <input
                                type="text"
                                class="form-control  @error('zipcode') is-invalid @enderror"
                                id="zipcode"
                                name="zipcode"
                                placeholder="Ex.: 00000-000"
                                autocomplete="off"
                                value="{{ $address->zipcode ?? '' }}"
                                required
                            />
                            @error('zipcode')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <label for="street">Rua*</label>
                                    <input
                                        type="text"
                                        class="form-control  @error('street') is-invalid @enderror"
                                        id="street"
                                        name="street"
                                        placeholder="Ex.: Rua São José"
                                        value="{{ $address->street ?? '' }}"
                                        required
                                    />
                                    @error('street')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="number">Número*</label>
                                    <input
                                        type="number"
                                        min="1"
                                        max="9999"
                                        class="form-control  @error('number') is-invalid @enderror"
                                        id="number"
                                        name="number"
                                        placeholder="Ex.: 0000"
                                        value="{{ $address->number ?? '' }}"
                                        required
                                    />
                                    @error('number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="complement">Complemento</label>
                            <input
                                type="text"
                                class="form-control @error('complement') is-invalid @enderror"
                                id="complement"
                                name="complement"
                                placeholder="Ex.: Apto/Bloco/Ponto de Referência"
                                value="{{ $address->complement ?? '' }}"
                            />
                            @error('complement')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="neighborhood">Bairro*</label>
                            <input
                                type="text"
                                class="form-control @error('neighborhood') is-invalid @enderror"
                                id="neighborhood"
                                name="neighborhood"
                                placeholder="Ex.: Centro"
                                value="{{ $address->neighborhood ?? '' }}"
                                required
                            />
                            @error('neighborhood')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <label for="city">Cidade*</label>
                                    <input
                                        type="text"
                                        class="form-control  @error('city') is-invalid @enderror"
                                        id="city"
                                        name="city"
                                        placeholder="Ex.: São Paulo"
                                        value="{{ $address->city ?? '' }}"
                                        required
                                    />
                                    @error('city')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="state">Estado*</label>
                                    <input
                                        type="text"
                                        class="form-control  @error('state') is-invalid @enderror"
                                        id="state"
                                        name="state"
                                        placeholder="Ex.: SP"
                                        value="{{ $address->state ?? '' }}"
                                        required
                                    />
                                    @error('state')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            <strong>SALVAR CONTATO</strong>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

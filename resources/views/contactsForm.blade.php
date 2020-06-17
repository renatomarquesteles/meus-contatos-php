@extends('layouts.app')

@section('title', '- Criar Contato')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Criar novo contato</div>

                <div class="card-body">
                    <form action="/contacts" method="POST">
                        @csrf
                        <p><strong>Dados pessoais</strong></p>
                        <div class="form-group">
                            <label for="name">Nome completo</label>
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                required
                                autofocus
                            />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                required
                                placeholder="nome@exemplo.com"
                            />
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefone/Celular</label>
                            <input
                                type="text"
                                class="form-control @error('phone') is-invalid @enderror"
                                id="phone"
                                name="phone"
                                required
                                placeholder="(99)99999-9999"
                            />
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <hr />

                        <p><strong>Endereço</strong></p>
                        <div class="form-group">
                            <label for="zipcode">CEP</label>
                            <input
                                type="text"
                                class="form-control @error('zipcode') is-invalid @enderror"
                                id="zipcode"
                                name="zipcode"
                                required
                                placeholder="99999-999"
                            />
                            @error('zipcode')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <label for="street">Logradouro</label>
                                    <input
                                        type="text"
                                        class="form-control @error('street') is-invalid @enderror"
                                        id="street"
                                        name="street"
                                        required
                                    />
                                    @error('street')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="number">Número</label>
                                    <input
                                        type="number"
                                        class="form-control @error('number') is-invalid @enderror"
                                        id="number"
                                        name="number"
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
                            />
                            @error('complement')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="neighborhood">Bairro</label>
                            <input
                                type="text"
                                class="form-control @error('neighborhood') is-invalid @enderror"
                                id="neighborhood"
                                name="neighborhood"
                                required
                            />
                            @error('neighborhood')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <label for="city">Cidade</label>
                                    <input
                                        type="text"
                                        class="form-control @error('city') is-invalid @enderror"
                                        id="city"
                                        name="city"
                                        required
                                    />
                                    @error('city')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="state">Estado</label>
                                    <input
                                        type="text"
                                        class="form-control @error('state') is-invalid @enderror"
                                        id="state"
                                        name="state"
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

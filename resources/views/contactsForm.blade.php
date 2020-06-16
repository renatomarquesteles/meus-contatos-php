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
                                class="form-control"
                                id="name"
                                name="name"
                                required
                                autofocus
                            />
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="nome@exemplo.com"
                                required
                            />
                        </div>
                        <div class="form-group">
                            <label for="phone">Telefone/Celular</label>
                            <input
                                type="text"
                                class="form-control"
                                id="phone"
                                name="phone"
                                placeholder="(99)99999-9999"
                                required
                            />
                        </div>

                        <hr />

                        <p><strong>Endereço</strong></p>
                        <div class="form-group">
                            <label for="zipcode">CEP</label>
                            <input
                                type="text"
                                class="form-control"
                                id="zipcode"
                                name="zipcode"
                                placeholder="99999-999"
                                required
                            />
                            <div class="invalid-feedback">
                                Insira um CEP válido.
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <label for="street">Logradouro</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="street"
                                        name="street"
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        O campo logradouro é obrigatório.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="number">Número</label>
                                    <input
                                        type="number"
                                        class="form-control"
                                        id="number"
                                        name="number"
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        O campo número é obrigatório.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="complement">Complemento</label>
                            <input
                                type="text"
                                class="form-control"
                                id="complement"
                                name="complement"
                            />
                        </div>
                        <div class="form-group">
                            <label for="neighborhood">Bairro</label>
                            <input
                                type="text"
                                class="form-control"
                                id="neighborhood"
                                name="neighborhood"
                                required
                            />
                            <div class="invalid-feedback">
                                O campo bairro é obrigatório.
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <label for="city">Cidade</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="city"
                                        name="city"
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        O campo cidade é obrigatório.
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="state">Estado</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="state"
                                        name="state"
                                        required
                                    />
                                    <div class="invalid-feedback">
                                        O campo estado é obrigatório.
                                    </div>
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

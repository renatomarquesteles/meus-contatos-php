@extends('layouts.app')

@section('title', __('contacts/form.create_contact'))

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __('contacts/form.create_new_contact') }}
                </div>
                <div class="card-body">
                    <form action="/contacts" method="POST">
                        @csrf
                        <p>
                            <strong>
                                {{ __('contacts/form.personal_info') }}
                            </strong>
                        </p>
                        <div class="form-group">
                            <label for="name">
                                {{ __('contacts/form.full_name') }}*
                            </label>
                            <input
                                type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name"
                                name="name"
                                placeholder="Ex.: {{ __('contacts/form.full_name_example') }}"
                                required
                                autofocus
                            />
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">
                                {{ __('contacts/form.email') }}*
                            </label>
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                placeholder="Ex.: {{ __('contacts/form.email_example') }}"
                                required
                            />
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone">
                                {{ __('contacts/form.phone') }}*
                            </label>
                            <input
                                type="text"
                                class="form-control @error('phone') is-invalid @enderror"
                                id="phone"
                                name="phone"
                                placeholder="Ex.: {{ __('contacts/form.phone_example') }}"
                                autocomplete="off"
                                required
                            />
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <hr />
                        <p><strong>{{ __('contacts/form.address') }}</strong></p>
                        <div class="form-group">
                            <label for="zipcode">
                                {{ __('contacts/form.zipcode') }}*
                            </label>
                            <input
                                type="text"
                                class="form-control @error('zipcode') is-invalid @enderror"
                                id="zipcode"
                                name="zipcode"
                                placeholder="Ex.: {{ __('contacts/form.zipcode_example') }}"
                                autocomplete="off"
                                required
                            />
                            @error('zipcode')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <label for="street">
                                        {{ __('contacts/form.street') }}*
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control @error('street') is-invalid @enderror"
                                        id="street"
                                        name="street"
                                        placeholder="Ex.: {{ __('contacts/form.street_example') }}"
                                        required
                                    />
                                    @error('street')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="number">
                                        {{ __('contacts/form.number') }}*
                                    </label>
                                    <input
                                        type="number"
                                        min="1"
                                        max="9999"
                                        class="form-control @error('number') is-invalid @enderror"
                                        id="number"
                                        name="number"
                                        placeholder="Ex.: 0000"
                                        required
                                    />
                                    @error('number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="complement">
                                {{ __('contacts/form.complement') }}
                            </label>
                            <input
                                type="text"
                                class="form-control @error('complement') is-invalid @enderror"
                                id="complement"
                                name="complement"
                                placeholder="Ex.: {{ __('contacts/form.complement_example') }}"
                            />
                            @error('complement')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="neighborhood">
                                {{ __('contacts/form.neighborhood') }}*
                            </label>
                            <input
                                type="text"
                                class="form-control @error('neighborhood') is-invalid @enderror"
                                id="neighborhood"
                                name="neighborhood"
                                placeholder="Ex.: {{ __('contacts/form.neighborhood_example') }}"
                                required
                            />
                            @error('neighborhood')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <label for="city">
                                        {{ __('contacts/form.city') }}*
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control @error('city') is-invalid @enderror"
                                        id="city"
                                        name="city"
                                        placeholder="Ex.: {{ __('contacts/form.city_example') }}"
                                        required
                                    />
                                    @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="state">
                                        {{ __('contacts/form.state') }}*
                                    </label>
                                    <input
                                        type="text"
                                        class="form-control @error('state') is-invalid @enderror"
                                        id="state"
                                        name="state"
                                        placeholder="Ex.: {{ __('contacts/form.state_example') }}"
                                        required
                                    />
                                    @error('state')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">
                            <strong>{{ __('contacts/form.save_contact') }}</strong>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('title', __('contacts/list.contact_list'))

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
                    + {{ __('contacts/list.create_contact') }}
                    </a>
                </p>
            </div>
            <div class="card">
                <div class="card-header">
                    {{ __('contacts/list.contact_list') }}
                </div>
                <div class="card-body">
                    @if (count($contacts) > 0)
                    <table class="table table-borderless table-hover">
                        <thead>
                            <tr>
                                <th scope="col">
                                    {{ __('contacts/list.id') }}
                                </th>
                                <th scope="col">
                                    {{ __('contacts/list.name') }}
                                </th>
                                <th scope="col">
                                    {{ __('contacts/list.email') }}
                                </th>
                                <th scope="col">
                                    {{ __('contacts/list.phone') }}
                                </th>
                                <th scope="col">
                                    {{ __('contacts/list.actions') }}
                                </th>
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
                                        {{ __('contacts/list.edit') }}
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
                                            {{ __('contacts/list.remove') }}
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <p>{{ __('contacts/list.empty_list') }}</p>
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
                <p><strong>{{ __('contacts/list.contact') }}</strong></p>
                <p><span id="phone"></span></p>
                <p><span id="email"></span></p>
                <hr />
                <p><strong>{{ __('contacts/list.address') }}</strong></p>
                <p>{{ __('contacts/list.zipcode') }}: <span id="zipcode"></span></p>
                <p>{{ __('contacts/list.street') }}: <span id="street"></span>, <span id="number"></span></p>
                <p id="complement"></p>
                <p>{{ __('contacts/list.neighborhood') }}: <span id="neighborhood"></span></p>
                <p>{{ __('contacts/list.city') }}: <span id="city"></span> - <span id="state"></span></p>
            </div>
        </div>
    </div>
</div>
@endsection

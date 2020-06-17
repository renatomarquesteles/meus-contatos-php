<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'         => 'required|string',
            'email'        => 'required|email:rfc,dns',
            'phone'        => 'required|string',
            'zipcode'      => 'required|string',
            'street'       => 'required|string',
            'number'       => 'required|numeric',
            'neighborhood' => 'required|string',
            'complement'   => 'nullable|string',
            'city'         => 'required|string',
            'state'        => 'required|string|max:2',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'O nome é obrigatório',
            'email.required'        => 'O e-mail é obrigatório',
            'email.email'           => 'E-mail inválido',
            'phone.required'        => 'O telefone é obrigatório',
            'zipcode.required'      => 'O CEP é obrigatório',
            'street.required'       => 'O logradouro é obrigatório',
            'number.required'       => 'O número é obrigatório',
            'neighborhood.required' => 'O bairro é obrigatório',
            'city.required'         => 'A cidade é obrigatória',
            'state.required'        => 'O estado é obrigatório',
            'state.max'             => 'O estado deve conter apenas 2 dígitos',
        ];
    }
}

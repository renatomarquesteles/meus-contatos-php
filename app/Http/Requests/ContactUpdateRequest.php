<?php

namespace App\Http\Requests;

use App\Filters\Zipcode;
use App\Filters\PhoneNumber;
use Illuminate\Foundation\Http\FormRequest;

class ContactUpdateRequest extends FormRequest
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

    public function filters()
    {
        return [
            'name'         => 'trim|cast:string|capitalize',
            'email'        => 'trim|cast:string|lowercase',
            'phone'        => 'trim|digit|phone_number',
            'zipcode'      => 'trim|digit|zipcode',
            'street'       => 'trim|cast:string|capitalize',
            'number'       => 'trim|digit|cast:int',
            'neighborhood' => 'trim|cast:string|capitalize',
            'complement'   => 'trim|cast:string',
            'city'         => 'trim|cast:string|capitalize',
            'state'        => 'trim|cast:string|uppercase',
        ];
    }

    public function customFilters()
    {
        return [
            'phone_number' => PhoneNumber::class,
            'zipcode' => Zipcode::class,
        ];
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
            'phone'        => 'required|string|min:14|max:15',
            'zipcode'      => 'required|string',
            'street'       => 'required|string',
            'number'       => 'required|numeric',
            'neighborhood' => 'required|string',
            'complement'   => 'nullable|string',
            'city'         => 'required|string',
            'state'        => 'required|string|size:2',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'O nome é obrigatório',
            'email.required'        => 'O e-mail é obrigatório',
            'email.email'           => 'E-mail inválido',
            'phone.required'        => 'O telefone é obrigatório',
            'phone.min'             => 'O telefone deve conter no mínimo 10 dígitos',
            'phone.max'             => 'O telefone pode conter no máximo 11 dígitos',
            'zipcode.required'      => 'O CEP é obrigatório',
            'street.required'       => 'O logradouro é obrigatório',
            'number.required'       => 'O número é obrigatório',
            'neighborhood.required' => 'O bairro é obrigatório',
            'city.required'         => 'A cidade é obrigatória',
            'state.required'        => 'O estado é obrigatório',
            'state.size'            => 'O estado deve conter apenas 2 dígitos',
        ];
    }
}

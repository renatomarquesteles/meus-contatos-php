<?php

namespace App\Http\Services;

use DB;
use App\Models\Address;
use App\Models\Contact;
use App\Repositories\AddressRepository;
use App\Repositories\ContactRepository;
use App\Http\Services\Params\AddressParams;
use App\Http\Services\Params\ContactParams;
use App\Http\Services\Responses\ServiceResponse;

class ContactsService
{
    /**
     * @var Contact
     */
    private $contact;

    /**
     * @var Address
     */
    private $address;

    /**
     * @var ContactRepository
     */
    private $contactRepository;

    /**
     * @var AddressRepository
     */
    private $addressRepository;

    /**
     * @param Contact $contact
     * @param Address $address
     * @param ContactRepository $contactRepository
     * @param AddressRepository $addressRepository
     */
    public function __construct(
        Contact $contact,
        Address $address,
        ContactRepository $contactRepository,
        AddressRepository $addressRepository
    ) {
        $this->contact = $contact;
        $this->address = $address;
        $this->contactRepository = $contactRepository;
        $this->addressRepository = $addressRepository;
    }

    public function all($userId)
    {
        try {
            $contacts = $this->contactRepository->allContacts($userId);
        } catch (\Throwable $th) {
            return new ServiceResponse(false, 'Erro ao buscar contatos', $th);
        }
        return new ServiceResponse(
            true,
            'Contatos listados com sucesso',
            $contacts
        );
    }

    public function find($contactId)
    {
        try {
            $contact = $this->contactRepository->findContact($contactId);
            return new ServiceResponse(true, 'Contato encontrado', $contact);
        } catch (\Throwable $th) {
            return new ServiceResponse(false, 'Erro ao buscar contato', $th);
        }
    }

    public function create($params)
    {
        DB::beginTransaction();
        try {
            $addressParams = new AddressParams(
                $params->zipcode,
                $params->street,
                $params->number,
                $params->neighborhood,
                $params->city,
                $params->state,
                $params->complement ?? null
            );

            $addressResponse = $this->createAddress($addressParams);

            if (!$addressResponse->success) {
                return $addressResponse;
            }

            $address = $addressResponse->data;

            $contactParams = new ContactParams(
                auth()->user()->id,
                $params->name,
                $params->email,
                $params->phone,
                $address->id
            );

            $contact = $this->contactRepository->createContact(
                $contactParams->toArray()
            );

            DB::commit();

            return new ServiceResponse(
                true,
                'Contato criado com sucesso',
                $contact
            );
        } catch (\Throwable $th) {
            DB::rollback();
            return new ServiceResponse(false, 'Erro ao criar contato', $th);
        }
    }

    public function createAddress(AddressParams $params)
    {
        try {
            $address = $this->addressRepository->createAddress(
                $params->toArray()
            );

            return new ServiceResponse(
                true,
                'Endereço criado com sucesso',
                $address
            );
        } catch (\Throwable $th) {
            DB::rollback();
            return new ServiceResponse(false, 'Erro ao criar endereço', $th);
        }
    }

    public function update($params, $contactId)
    {
        DB::beginTransaction();
        try {
            $addressParams = new AddressParams(
                $params->zipcode,
                $params->street,
                $params->number,
                $params->neighborhood,
                $params->city,
                $params->state,
                $params->complement ?? null
            );

            $addressResponse = $this->updateAddress($addressParams);

            if (!$addressResponse->success) {
                return $addressResponse;
            }

            $contact = $this->contactRepository->updateContact(
                $params,
                $contactId
            );

            DB::commit();

            $contactName = $contact->name;

            return new ServiceResponse(
                true,
                'Contato ' . $contactName . ' atualizado com sucesso!',
                $contact
            );
        } catch (\Throwable $th) {
            DB::rollback();
            return new ServiceResponse(false, 'Erro ao atualizar contato', $th);
        }
    }

    public function updateAddress(AddressParams $params)
    {
        try {
            $address = $this->addressRepository->updateAddress(
                $params->toArray()
            );

            return new ServiceResponse(
                true,
                'Endereço atualizado com sucesso',
                $address
            );
        } catch (\Throwable $th) {
            DB::rollback();
            return new ServiceResponse(
                false,
                'Erro ao atualizar endereço',
                $th
            );
        }
    }

    public function delete($contactId)
    {
        try {
            $contactName = $this->contactRepository->deleteContact($contactId);
            return new ServiceResponse(
                true,
                'Contato ' . $contactName . ' removido com sucesso!'
            );
        } catch (\Throwable $th) {
            return new ServiceResponse(false, 'Erro ao remover contato', $th);
        }
    }
}

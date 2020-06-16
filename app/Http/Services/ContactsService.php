<?php

namespace App\Http\Services;

use DB;
use App\Models\Address;
use App\Models\Contact;
use App\Http\Services\Params\AddressParams;
use App\Http\Services\Params\ContactParams;
use App\Repositories\ContactRepository;

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
     * @param Contact $contact
     * @param Address $address
     * @param ContactRepository $contactRepository
     */
    public function __construct(
        Contact $contact,
        Address $address,
        ContactRepository $contactRepository
    ) {
        $this->contact = $contact;
        $this->address = $address;
        $this->contactRepository = $contactRepository;
    }

    public function all($userId)
    {
        $contacts = $this->contactRepository->allContacts($userId);
        return $contacts;
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
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

            $address = $this->createAddress($addressParams);

            $contactParams = new ContactParams(
                auth()->user()->id,
                $params->name,
                $params->email,
                $params->phone,
                $address->id
            );

            $contact = $this->contactRepository->createContact($contactParams->toArray());
            DB::commit();

            return $contact;
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
        }
    }

    public function createAddress(AddressParams $params)
    {
        try {
            $address = $this->address->create($params->toArray());
            return $address;
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
        }
    }
}

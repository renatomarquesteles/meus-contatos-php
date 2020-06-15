<?php

namespace App\Http\Services;

use DB;
use App\Models\Address;
use App\Models\Contact;
use App\Http\Services\Params\AddressParams;
use App\Http\Services\Params\ContactParams;

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

    /*
     * @param Contact $contact
     */
    public function __construct(Contact $contact, Address $address)
    {
        $this->contact = $contact;
        $this->address = $address;
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

            $contact = $this->contact->create($contactParams->toArray());
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

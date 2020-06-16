<?php

namespace App\Http\Services;

use DB;
use App\Models\Address;
use App\Http\Services\Params\AddressParams;
use App\Repositories\AddressRepository;

class AddressService
{
    /**
     * @var Address
     */
    private $address;

    /**
     * @var AddressRepository
     */
    private $addressRepository;

    /*
     * @param Contact $contact
     */
    public function __construct(Address $address, AddressRepository $addressRepository)
    {
        $this->address = $address;
        $this->addressRepository = $addressRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AddressParams $params)
    {
        try {
            $address = $this->addressRepository->createAddress($params->toArray());
            return $address;
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
        }
    }
}

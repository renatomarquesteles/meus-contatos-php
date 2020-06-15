<?php

namespace App\Http\Services;

use DB;
use App\Models\Address;
use App\Http\Services\Params\AddressParams;

class AddressService
{
    /**
     * @var Address
     */
    private $address;

    /*
     * @param Contact $contact
     */
    public function __construct(Address $address)
    {
        $this->address = $address;
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
            $address = $this->address->create($params->toArray());
            return $address;
        } catch (\Throwable $th) {
            DB::rollback();
            dd($th);
        }
    }
}

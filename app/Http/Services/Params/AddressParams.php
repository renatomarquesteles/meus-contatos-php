<?php

namespace App\Http\Services\Params;

use App\Http\Services\Params\BaseServiceParams;

class AddressParams extends BaseServiceParams
{
    public $zipcode;
    public $street;
    public $number;
    public $neighborhood;
    public $city;
    public $state;
    public $complement;

    public function __construct(
        string $zipcode,
        string $street,
        int $number,
        string $neighborhood,
        string $city,
        string $state,
        string $complement = null
    ) {
        parent::__construct();
    }
}

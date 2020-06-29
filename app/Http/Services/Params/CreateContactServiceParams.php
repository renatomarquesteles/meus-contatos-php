<?php

namespace App\Http\Services\Params;

use App\Http\Services\Params\BaseServiceParams;

class CreateContactServiceParams extends BaseServiceParams
{
    public $userId;
    public $name;
    public $email;
    public $phone;
    public $zipcode;
    public $street;
    public $number;
    public $neighborhood;
    public $city;
    public $state;
    public $complement;

    public function __construct(
        int $userId,
        string $name,
        string $email,
        string $phone,
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

<?php

namespace App\Http\Services\Params;

use App\Http\Services\Params\BaseServiceParams;

class ContactParams extends BaseServiceParams
{
    public $user_id;
    public $name;
    public $email;
    public $phone;
    public $address_id;
    public $avatar;

    public function __construct(
        int $user_id,
        string $name,
        string $email,
        string $phone,
        int $address_id,
        string $avatar = ''
    ) {
        parent::__construct();
    }
}

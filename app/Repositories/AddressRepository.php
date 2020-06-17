<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface AddressRepository.
 *
 * @package namespace App\Repositories;
 */
interface AddressRepository extends RepositoryInterface
{
    public function createAddress($addressParams);
    public function updateAddress($addressParams, $addressId);
}

<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\AddressRepository;
use App\Models\Address;
use App\Validators\AddressValidator;

/**
 * Class AddressRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class AddressRepositoryEloquent extends BaseRepository implements AddressRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Address::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function createAddress($addressParams)
    {
        $address = $this->model->create($addressParams);
        return $address;
    }

    public function updateAddress($addressParams, $addressId)
    {
        $address = $this->model->find($addressId);
        if ($addressParams->zipcode) {
            $address->zipcode = $addressParams->zipcode;
        }
        if ($addressParams->street) {
            $address->street = $addressParams->street;
        }
        if ($addressParams->number) {
            $address->number = $addressParams->number;
        }
        if ($addressParams->neighborhood) {
            $address->neighborhood = $addressParams->neighborhood;
        }
        if ($addressParams->city) {
            $address->city = $addressParams->city;
        }
        if ($addressParams->state) {
            $address->state = $addressParams->state;
        }
        $address->complement = $addressParams->complement;
        $address->save();
        return $address;
    }
}

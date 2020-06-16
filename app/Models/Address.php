<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Address.
 *
 * @package namespace App\Models;
 */
class Address extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'zipcode',
        'city',
        'state',
        'neighborhood',
        'street',
        'number',
        'complement',
    ];

    /**
     * Gets the address contacts
     */
    public function contacts()
    {
        return $this->hasMany('App\Models\Contact');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
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
        return $this->hasMany('App\Contact');
    }
}

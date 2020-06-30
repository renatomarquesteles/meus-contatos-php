<?php

namespace App\Models;

use App\Models\User;
use App\Models\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Contact.
 *
 * @package namespace App\Models;
 */
class Contact extends Model implements Transformable
{
    use SoftDeletes;
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'user_id',
        'address_id',
    ];

    /**
     * Get the user that owns the contact
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the contact's address
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}

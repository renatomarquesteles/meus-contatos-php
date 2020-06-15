<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'avatar',
        'user_id',
        'address_id',
    ];

    /**
     * Get the user that owns the contact
     */
    public function user()
    {
        $this->belongsTo('App\Models\User');
    }

    /**
     * Get the contact's address
     */
    public function address()
    {
        $this->belongsTo('App\Models\Address');
    }
}

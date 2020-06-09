<?php

namespace App;

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
        'user_id',
        'address_id',
        'avatar_id',
    ];

    /**
     * Get the user that owns the contact
     */
    public function user()
    {
        $this->belongsTo('App\User');
    }

    /**
     * Get the contact's address
     */
    public function address()
    {
        $this->belongsTo('App\Address');
    }

    /**
     * Get the contact's address
     */
    public function avatar()
    {
        $this->belongsTo('App\File');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'path',
    ];

    /**
     * Get the contact that owns the avatar
     */
    public function contact()
    {
        $this->hasOne('App\User', 'avatar_id');
    }
}

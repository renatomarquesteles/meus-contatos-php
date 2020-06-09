<?php

namespace App\Http\Services;

use App\User;

class UsersService
{
    /**
     * @var User
     */
    private $user;

    /*
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function create($params)
    {
        try {
            $user = $this->user->create($params);
            return $user;
        } catch (\Throwable $th) {
            return false;
        }
    }
}

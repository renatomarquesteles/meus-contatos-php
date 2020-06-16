<?php

namespace App\Http\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UsersService
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /*
     * @param User $user
     */
    public function __construct(User $user, UserRepository $userRepository)
    {
        $this->user = $user;
        $this->userRepository = $userRepository;
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
            $user = $this->userRepository->createUser($params);
            return $user;
        } catch (\Throwable $th) {
            return false;
        }
    }
}

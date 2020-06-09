<?php

namespace App\Http\Controllers;

use App\Http\Services\UsersService;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * @var User
     */
    private $user;

    /**
     * @var UsersService
     */
    private $usersService;

    /*
     * @param User $user
     */
    public function __construct(User $user, UsersService $usersService)
    {
        $this->user = $user;
        $this->usersService = $usersService;
    }

    public function index()
    {
        $users = $this->user->all();
        return view('users', compact('users'));
    }

    public function create()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $this->usersService->create($request->all());
        dd($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

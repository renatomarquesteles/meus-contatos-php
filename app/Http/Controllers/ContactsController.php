<?php

namespace App\Http\Controllers;

use DB;
use App\Contact;
use Illuminate\Http\Request;
use App\Http\Services\AddressService;
use App\Http\Services\ContactsService;
use App\Http\Services\Params\AddressParams;
use App\Http\Services\Params\ContactParams;

class ContactsController extends Controller
{
    /**
     * @var Contact
     */
    private $contact;

    /**
     * @var ContactsService
     */
    private $contactsService;

    /**
     * @var AddressService
     */
    private $addressService;

    /**
     * @param Contact $contact
     * @param ContactsService $contactsService
     * @param AddressService $addressService
     */
    public function __construct(
        Contact $contact,
        ContactsService $contactsService,
        AddressService $addressService
    ) {
        $this->contact = $contact;
        $this->contactsService = $contactsService;
        $this->addressService = $addressService;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $contacts = $this->contact->where('user_id', $userId)->get();
        return view('contacts', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contactsForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->contactsService->create($request);

        return redirect('/contacts');
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

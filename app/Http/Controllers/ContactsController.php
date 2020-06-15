<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Services\ContactsService;

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
     * @param Contact $contact
     * @param ContactsService $contactsService
     */
    public function __construct(
        Contact $contact,
        ContactsService $contactsService
    ) {
        $this->contact = $contact;
        $this->contactsService = $contactsService;
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
        $contacts = $this->contactsService->all($userId);
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
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Models\Contact;
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
        $contactsServiceResponse = $this->contactsService->all($userId);

        if (!$contactsServiceResponse->success) {
            return redirect(url()->previous())->withError(
                $contactsServiceResponse->message
            );
        }

        $contacts = $contactsServiceResponse->data;

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
    public function store(ContactStoreRequest $contactStoreRequest)
    {
        $contactsServiceResponse = $this->contactsService->create(
            $contactStoreRequest
        );

        if (!$contactsServiceResponse->success) {
            return redirect(url()->previous())->withError(
                $contactsServiceResponse->message
            );
        }

        $contactName = $contactsServiceResponse->data->name;

        return redirect('/contacts')->withSuccess(
            'Contato ' . $contactName . ' criado com sucesso!'
        );
    }
}

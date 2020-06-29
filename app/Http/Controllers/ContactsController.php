<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactStoreRequest;
use App\Http\Requests\ContactUpdateRequest;
use App\Models\Contact;
use App\Http\Services\ContactsService;
use App\Http\Services\Params\CreateContactServiceParams;

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
     * @return mixed
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
     * @return mixed
     */
    public function create()
    {
        return view('contactsForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactStoreRequest $request
     * @return mixed
     */
    public function store(ContactStoreRequest $request)
    {
        $userId = auth()->user()->id;

        $params = new CreateContactServiceParams(
            $userId,
            $request->name,
            $request->email,
            $request->phone,
            $request->zipcode,
            $request->street,
            $request->number,
            $request->neighborhood,
            $request->city,
            $request->state,
            $request->complement ?? ''
        );

        $contactsServiceResponse = $this->contactsService->create($params);

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

     /**
     * Show the form for editing the specified resource.
     *
     * @param int $contactId
     * @return mixed
     */
    public function edit($contactId)
    {
        $contactResponse = $this->contactsService->find($contactId);
        $contact = $contactResponse->data;
        $address = $contact->address()->get()->first();
        return view('contactsFormEdit', compact('contact', 'address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\ContactUpdateRequest $contactUpdateRequest
     * @param int $contactId
     * @return mixed
     */
    public function update(
        ContactUpdateRequest $contactUpdateRequest,
        $contactId
    ) {
        $userId = auth()->user()->id;
        $contactsServiceResponse = $this->contactsService->update(
            $contactUpdateRequest,
            $contactId,
            $userId
        );

        if (!$contactsServiceResponse->success) {
            return redirect(url()->previous())->withError(
                $contactsServiceResponse->message
            );
        }

        return redirect('/contacts')->withSuccess(
            $contactsServiceResponse->message
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $contactId
     * @return mixed
     */
    public function destroy($contactId)
    {
        $contactsServiceResponse = $this->contactsService->delete($contactId);

        if (!$contactsServiceResponse->success) {
            return redirect(url()->previous())->withError(
                $contactsServiceResponse->message
            );
        }

        return redirect('/contacts')->withSuccess(
            $contactsServiceResponse->message
        );
    }
}

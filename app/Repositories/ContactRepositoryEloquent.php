<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ContactRepository;
use App\Models\Contact;
use App\Validators\ContactValidator;

/**
 * Class ContactRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ContactRepositoryEloquent extends BaseRepository implements ContactRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Contact::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function allContacts($userId)
    {
        $contacts = $this->model->where('user_id', $userId)->get();
        return $contacts;
    }

    public function createContact($contactParams)
    {
        $contact = $this->model->create($contactParams);
        return $contact;
    }

    public function findContact($contactId)
    {
        $contact = $this->model->find($contactId);
        return $contact;
    }

    public function updateContact($contactParams, $contactId)
    {
        $contact = $this->model->find($contactId);
        if ($contactParams->name) {
            $contact->name = $contactParams->name;
        }
        if ($contactParams->phone) {
            $contact->phone = $contactParams->phone;
        }
        if ($contactParams->email) {
            $contact->email = $contactParams->email;
        }
        $contact->save();
        return $contact;
    }

    public function deleteContact($contactId)
    {
        $contact = $this->model->find($contactId);
        $contactName = $contact->name;
        $contact->delete();
        return $contactName;
    }
}

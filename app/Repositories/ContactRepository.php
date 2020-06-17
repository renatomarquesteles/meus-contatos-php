<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface ContactRepository.
 *
 * @package namespace App\Repositories;
 */
interface ContactRepository extends RepositoryInterface
{
    public function allContacts($userId);
    public function createContact($contactParams);
    public function findContact($contactId);
    public function updateContact($contactParams, $contactId);
    public function deleteContact($contactId);
}

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
    public function createContact($params);
    public function findContact($contactId);
    public function updateContact($params, $contactId);
    public function deleteContact($contactId);
}

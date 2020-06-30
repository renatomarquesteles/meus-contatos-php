<?php

namespace Tests\Unit;

use Faker\Factory;
use Tests\TestCase;
use App\Http\Services\ContactsService;
use App\Http\Services\Params\AddressParams;
use App\Http\Services\Params\ContactParams;
use App\Http\Services\Params\CreateContactServiceParams;
use App\Http\Services\Params\UpdateContactServiceParams;
use App\Http\Services\Responses\ServiceResponse;
use App\Models\Address;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;

class ContactTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    protected $contactsService;

    public function setUp(): void
    {
        parent::setUp();

        $this->contactsService = app(ContactsService::class);
    }

    public function testShouldCreateNewAddress()
    {
        $faker = Factory::create('pt_BR');
        $params = new AddressParams(
            $faker->postcode,
            $faker->streetName,
            $faker->buildingNumber,
            $faker->words(2, true),
            $faker->city,
            $faker->stateAbbr,
            $faker->secondaryAddress
        );

        $serviceResponse = $this->contactsService->createAddress($params);

        $address = $serviceResponse->data;

        $this->assertInstanceOf(ServiceResponse::class, $serviceResponse);
        $this->assertEquals(true, $serviceResponse->success);
        $this->assertInstanceOf(Address::class, $address);
        $this->assertDatabaseHas('addresses', ['id' => $address->id]);
    }

    public function testShouldCreateNewContact()
    {
        $faker = Factory::create('pt_BR');
        $user = factory(User::class)->create();
        $address = factory(Address::class)->create();
        $contactParams = new ContactParams(
            $user->id,
            $faker->name(),
            $faker->email,
            $faker->phoneNumber,
            $address->id
        );

        $serviceResponse = $this->contactsService
            ->createContact($contactParams);
        $contact = $serviceResponse->data;

        $this->assertInstanceOf(ServiceResponse::class, $serviceResponse);
        $this->assertEquals(true, $serviceResponse->success);
        $this->assertInstanceOf(Contact::class, $contact);
        $this->assertDatabaseHas('contacts', ['id' => $contact->id]);
    }

    public function testShouldCreateContactWithAddress()
    {
        $faker = Factory::create('pt_BR');
        $user = factory(User::class)->create();

        $params = new CreateContactServiceParams(
            $user->id,
            $faker->name(),
            $faker->email,
            $faker->phoneNumber,
            $faker->postcode,
            $faker->streetName,
            $faker->buildingNumber,
            $faker->words(2, true),
            $faker->city,
            $faker->stateAbbr,
            $faker->secondaryAddress
        );

        $serviceResponse = $this->contactsService->create($params);
        $contact = $serviceResponse->data;
        $address = $contact->address;

        $this->assertInstanceOf(ServiceResponse::class, $serviceResponse);
        $this->assertEquals(true, $serviceResponse->success);
        $this->assertInstanceOf(Contact::class, $contact);
        $this->assertDatabaseHas('contacts', ['id' => $contact->id]);
        $this->assertDatabaseHas('addresses', ['id' => $address->id]);
    }

    public function testShouldUpdateAddress()
    {
        $faker = Factory::create('pt_BR');
        $address = factory(Address::class)->create();
        $params = new AddressParams(
            $faker->postcode,
            $faker->streetName,
            $faker->buildingNumber,
            $faker->words(2, true),
            $faker->city,
            $faker->stateAbbr,
            $faker->secondaryAddress
        );

        $serviceResponse = $this->contactsService
            ->updateAddress($params, $address->id);

        $updatedAddress = $serviceResponse->data;

        $this->assertInstanceOf(ServiceResponse::class, $serviceResponse);
        $this->assertEquals(true, $serviceResponse->success);
        $this->assertInstanceOf(Address::class, $updatedAddress);
        $this->assertDatabaseHas('addresses', [
            'id'           => $address->id,
            'zipcode'      => $params->zipcode,
            'street'       => $params->street,
            'number'       => $params->number,
            'neighborhood' => $params->neighborhood,
            'city'         => $params->city,
            'state'        => $params->state,
            'complement'   => $params->complement,
        ]);
    }

    public function testShouldUpdateContact()
    {
        $faker = Factory::create('pt_BR');
        $user = factory(User::class)->create();
        $address = factory(Address::class)->create();
        $contact = factory(Contact::class)->create([
            'user_id'    => $user->id,
            'address_id' => $address->id
        ]);

        $params = new ContactParams(
            $user->id,
            $faker->name(),
            $faker->email,
            $faker->phoneNumber,
            $address->id
        );

        $serviceResponse = $this->contactsService->updateContact(
            $params,
            $contact->id
        );

        $updatedContact = $serviceResponse->data;

        $this->assertInstanceOf(ServiceResponse::class, $serviceResponse);
        $this->assertEquals(true, $serviceResponse->success);
        $this->assertInstanceOf(Contact::class, $updatedContact);
        $this->assertDatabaseHas('contacts', [
            'id' => $contact->id,
            'user_id' => $user->id,
            'address_id' => $address->id,
            'name' => $updatedContact->name,
            'phone' => $updatedContact->phone,
            'email' => $updatedContact->email,
        ]);
    }

    public function testShouldUpdateContactWithAddress()
    {
        $faker = Factory::create('pt_BR');
        $user = factory(User::class)->create();
        $address = factory(Address::class)->create();
        $contact = factory(Contact::class)->create([
            'user_id'    => $user->id,
            'address_id' => $address->id
        ]);

        $params = new UpdateContactServiceParams(
            $user->id,
            $contact->id,
            $faker->name(),
            $faker->email,
            $faker->phoneNumber,
            $faker->postcode,
            $faker->streetName,
            $faker->buildingNumber,
            $faker->words(2, true),
            $faker->city,
            $faker->stateAbbr,
            $faker->secondaryAddress
        );

        $serviceResponse = $this->contactsService->update($params);
        $updatedContact = $serviceResponse->data;

        $this->assertInstanceOf(ServiceResponse::class, $serviceResponse);
        $this->assertEquals(true, $serviceResponse->success);
        $this->assertInstanceOf(Contact::class, $updatedContact);
        $this->assertDatabaseHas('addresses', [
            'id'           => $address->id,
            'zipcode'      => $params->zipcode,
            'street'       => $params->street,
            'number'       => $params->number,
            'neighborhood' => $params->neighborhood,
            'city'         => $params->city,
            'state'        => $params->state,
            'complement'   => $params->complement,
        ]);
        $this->assertDatabaseHas('contacts', [
            'id'         => $contact->id,
            'user_id'    => $user->id,
            'address_id' => $address->id,
            'name'       => $updatedContact->name,
            'phone'      => $updatedContact->phone,
            'email'      => $updatedContact->email,
        ]);
    }

    public function testShouldReturnAllContactsFromUser()
    {
        $user = factory(User::class)->create();
        $address = factory(Address::class)->create();
        $createdContacts = factory(Contact::class, 5)->create([
            'user_id'    => $user->id,
            'address_id' => $address->id
        ]);

        $serviceResponse = $this->contactsService->all($user->id);

        $returnedContacts = $serviceResponse->data;

        $this->assertInstanceOf(ServiceResponse::class, $serviceResponse);
        $this->assertEquals(true, $serviceResponse->success);

        foreach ($createdContacts as $contact) {
            $this->assertTrue($returnedContacts->contains($contact));
        }
    }

    public function testShouldReturnASpecificContact()
    {
        $user = factory(User::class)->create();
        $address = factory(Address::class)->create();
        $createdContact = factory(Contact::class)->create([
            'user_id'    => $user->id,
            'address_id' => $address->id
        ]);

        $serviceResponse = $this->contactsService->find($createdContact->id);
        $returnedContact = $serviceResponse->data;

        $this->assertInstanceOf(ServiceResponse::class, $serviceResponse);
        $this->assertEquals(true, $serviceResponse->success);
        $this->assertInstanceOf(Contact::class, $returnedContact);
        $this->assertEquals([
            'id'         => $createdContact->id,
            'user_id'    => $createdContact->user_id,
            'address_id' => $createdContact->address_id,
            'name'       => $createdContact->name,
            'phone'      => $createdContact->phone,
            'email'      => $createdContact->email,
        ], [
            'id'         => $returnedContact->id,
            'user_id'    => $returnedContact->user_id,
            'address_id' => $returnedContact->address_id,
            'name'       => $returnedContact->name,
            'phone'      => $returnedContact->phone,
            'email'      => $returnedContact->email,
        ]);
    }

    public function testShouldSoftDeleteASpecificContact()
    {
        $user = factory(User::class)->create();
        $address = factory(Address::class)->create();
        $contact = factory(Contact::class)->create([
            'user_id'    => $user->id,
            'address_id' => $address->id
        ]);

        $serviceResponse = $this->contactsService->delete($contact->id);

        $contact->refresh();

        $this->assertInstanceOf(ServiceResponse::class, $serviceResponse);
        $this->assertEquals(true, $serviceResponse->success);
        $this->assertNull($serviceResponse->data);
        $this->assertNotNull($contact->deleted_at);
    }
}

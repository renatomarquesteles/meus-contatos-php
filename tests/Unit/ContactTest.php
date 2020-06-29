<?php

namespace Tests\Unit;

use Faker\Factory;
use Tests\TestCase;
use App\Http\Services\ContactsService;
use App\Http\Services\Params\AddressParams;
use App\Http\Services\Params\ContactParams;
use App\Http\Services\Params\CreateContactServiceParams;
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
        $faker = Factory::create();
        $addressParams = new AddressParams(
            $faker->postcode,
            $faker->streetName,
            $faker->buildingNumber,
            $faker->words(2, true),
            $faker->city,
            $faker->state,
            $faker->secondaryAddress
        );
        $serviceResponse = $this->contactsService->createAddress($addressParams);
        $address = $serviceResponse->data;

        $this->assertInstanceOf(ServiceResponse::class, $serviceResponse);
        $this->assertEquals(true, $serviceResponse->success);
        $this->assertInstanceOf(Address::class, $address);
        $this->assertDatabaseHas('addresses', ['id' => $address->id]);
    }

    public function testShouldCreateNewContact()
    {
        $faker = Factory::create();
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
        $faker = Factory::create();
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
            $faker->state,
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
}

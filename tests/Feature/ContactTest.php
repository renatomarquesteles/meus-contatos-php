<?php

namespace Tests\Feature;

use App\Http\Services\Params\CreateContactServiceParams;
use App\Models\User;
use Faker\Factory;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ContactTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUserCanCreateANewContact()
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

        $response = $this->actingAs($user)->post('/contacts', $params->toArray());

        // $response->dumpSession();
        $response->assertSessionHasNoErrors();
        $response->assertRedirect('http://localhost/contacts');
    }
}

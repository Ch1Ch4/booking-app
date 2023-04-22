<?php

namespace Tests\Feature;

use App\Models\Client;
use ClientSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
{
    use RefreshDatabase;

    private $client;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(ClientSeeder::class);
        $this->client = Client::all()->first();
    }

    public function test_client_list_success_response()
    {
        $response = $this
            ->getJson('api/clients');

        $response->assertStatus(200);
    }

    public function test_client_list_data_structure()
    {
        $response = $this
            ->getJson('api/clients');

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'first_name',
                    'last_name',
                    'email',
                    'passport_num',
                    'gender',
                ]
            ],
        ]);
    }

    public function test_single_client_success_response()
    {
        $response = $this
            ->getJson('api/clients/'.$this->client->id.'/show');

        $response->assertStatus(200);
    }

    public function test_single_client_data_structure()
    {
        $response = $this
            ->getJson('api/clients/'.$this->client->id.'/show');

        $response->assertJsonStructure([
            'data' => [
                'id',
                'first_name',
                'last_name',
                'email',
                'passport_num',
                'gender',
            ],
        ]);
    }

}

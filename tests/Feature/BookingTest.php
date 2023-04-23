<?php

namespace Tests\Feature;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookingTest extends TestCase
{
    use RefreshDatabase;
    private $client;
    private $product;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed();

        $this->product = Product::all()->first();
        $this->client = Client::all()->first();
    }

    public function test_booking_list_success_response()
    {
        $response = $this
            ->getJson('api/bookings');

        $response->assertStatus(200);
    }

    public function test_store_booking()
    {
        $response = $this
            ->postJson('api/bookings', [
                'client_id' => $this->client->id,
                'product_id' => $this->product->id
            ]);

        $response->assertCreated();
    }

    public function test_prevent_to_store_same_product_twice_for_single_client()
    {
        $firstResponse = $this->postJson('api/bookings', [
                'client_id' => $this->client->id,
                'product_id' => $this->product->id
            ]);

        $secondResponse = $this
            ->postJson('api/bookings', [
                'client_id' => $this->client->id,
                'product_id' => $this->product->id
            ]);

        $firstResponse->assertCreated();
        $secondResponse->assertStatus(422);
    }

    public function test_booking_product_that_is_not_available()
    {
        $product = factory(Product::class)->create(['capacity' => 0]);

        $response = $this
            ->postJson('api/bookings', [
                'client_id' => $this->client->id,
                'product_id' => $product->id
            ]);

        $response->assertNotFound();
    }

    public function test_booking_with_non_existing_product_id()
    {
        $response = $this
            ->postJson('api/bookings', [
                'client_id' => $this->client->id,
                'product_id' => 7777777
            ]);

        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['product_id']);
    }

    public function test_booking_with_non_existing_client_id()
    {
        $response = $this
            ->postJson('api/bookings', [
                'client_id' => 7777777,
                'product_id' => $this->product->id
            ]);


        $response->assertStatus(422);
        $response->assertJsonValidationErrors(['client_id']);
    }
}

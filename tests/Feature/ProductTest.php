<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use ProductSeeder;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    private $product;

    public function setUp(): void
    {
        parent::setUp();

        $this->seed(ProductSeeder::class);
        $this->product = Product::all()->first();
    }

    public function test_product_list_success_response()
    {
        $response = $this
            ->getJson('api/products');

        $response->assertStatus(200);
    }

    public function test_product_list_data_structure()
    {
        $response = $this
            ->getJson('api/products');

        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'title',
                    'type',
                    'description',
                    'capacity',
                    'isAvailableForBooking',
                ]
            ],
        ]);
    }

    public function test_single_product_success_response()
    {
        $response = $this
            ->getJson('api/products/'.$this->product->id.'/show');

        $response->assertStatus(200);
    }

    public function test_single_product_data_structure()
    {
        $response = $this
            ->getJson('api/products/'.$this->product->id.'/show');

        $response->assertJsonStructure([
            'data' => [
                'id',
                'title',
                'type',
                'description',
                'capacity',
                'isAvailableForBooking',
            ],
        ]);
    }
}

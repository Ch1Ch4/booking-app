<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingRequest;
use App\Http\Resources\BookingResource;
use App\Models\Booking;
use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;
use Symfony\Component\HttpFoundation\Response;

class BookingController extends Controller
{
    public function index(): JsonResource
    {
        return BookingResource::collection(Booking::all());
    }

    public function store(BookingRequest $request)
    {
        $validatedData = $request->validated();

        $product = Product::where('id', '=', $validatedData['product_id'])->firstOrFail();

        if ($product && !$product->isAvailableForBooking()) {
            return response()->json(['message' => 'Product is unavailable for booking'], Response::HTTP_NOT_FOUND);
        }

        return Booking::Create([
            'client_id' => $validatedData['client_id'],
            'product_id' => $validatedData['product_id'],
            'booked_on' => $validatedData['booked_on'] ?? Client::where('id', '=', $validatedData['client_id'])->firstOrFail()->full_name,
        ]);
    }
}
